<?php

namespace App\Http\Controllers;

use App\Models\jalur;
use App\Models\penumpang;
use App\Models\hari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PenumpangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penumpang = DB::table('haris')
                        ->join('jalurs','jalurs.hari','=','haris.id')
                        ->join('penumpangs','jalurs.id','=','penumpangs.id_jalur')
                        ->orderBy('haris.id')
                        ->orderBy('penumpangs.id')
                        ->get();

        return view('admin.tiket', compact('penumpang'));
    }



    // SELECT penumpangs.id_jalur, penumpangs.kode_penumpang, penumpangs.atas_nama,
    //jalurs.kota_asal, jalurs.kota_tujuan, jalurs.harga, jalurs.keberangkatan FROM
    //penumpangs INNER JOIN jalurs ON penumpangs.id_jalur=jalurs.id


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($request)
    {
        $tujuan = jalur::where('id',$request)->first();
        $hari = hari::where('id',$tujuan->hari)->first();
        $ini = Str::random(7);
        return view('admin.tiket.create',compact('tujuan','hari','ini'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_jalur' => 'required',
            'kode_penumpang' => 'required',
            'atas_nama' => 'required',
            'keberangkatan' => 'required'
        ]);

        $input = $request->all();
        $create = penumpang::create($input);

        activity()
        ->withProperties(['attributes' => ['kode_penumpang'=>$input['kode_penumpang'],
                                            'A/N'=>$input['atas_nama'],
                                            'keberangkatan'=>$input['keberangkatan']]])
        ->causedBy(auth()->user())
        ->performedOn($create)
        ->log('You have add penumpang');

        return redirect('/admin/tiket')->with('success','tiket created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\penumpang  $penumpang
     * @return \Illuminate\Http\Response
     */
    public function show(penumpang $penumpang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\penumpang  $penumpang
     * @return \Illuminate\Http\Response
     */
    public function edit(penumpang $penumpang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\penumpang  $penumpang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, penumpang $penumpang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\penumpang  $penumpang
     * @return \Illuminate\Http\Response
     */
    public function destroy(penumpang $penumpang, $id)
    {
        $log = penumpang::find($id);

        activity()
        ->withProperties(['attributes' => ['kode_penumpang'=>$log['kode_penumpang'],
                                            'A/N'=>$log['atas_nama'],
                                            'keberangkatan'=>$log['keberangkatan']]])
        ->causedBy(auth()->user())
        ->performedOn($log)
        ->log('You have delete penumpang');

        $log->delete();

        return redirect('admin/tiket')->with('success','Driver successfully deleted');
    }
}
