<?php

namespace App\Http\Controllers;

use App\Models\kendaraan;
use App\Models\jalur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $kendaraan = kendaraan::join("jalurs", function ($join) {
        //     $join->on("jalurs.id","=","kendaraans.id_jalur");
        //     })->get();

        $kendaraan = DB::table('jalurs')
                    ->join('kendaraans','jalurs.id','=','kendaraans.id_jalur')
                    ->orderBy('kendaraans.id')
                    ->get();
        return view('admin.kendaraan',compact('kendaraan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jalur = jalur::orderby('id')->get();

        return view('admin.kendaraan.create',compact('jalur'));
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
            'no_kendaraan' => 'required',
            'no_plat' =>'required',
            'jenis_kendaraan' =>'required',
            'jumlah_penumpang' =>'required',
        ]);

        $input = $request->all();
        kendaraan::create($input);

        return redirect('/admin/kendaraan')->with('success','Tempat created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function show(kendaraan $kendaraan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kendaraan = kendaraan::find($id);
        $jalur = jalur::where('id',$kendaraan->id)->first();
        $alljalur = jalur::orderby('id')->get();

        return view('admin.kendaraan.edit', compact('kendaraan','jalur','alljalur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = kendaraan::find($id);
        $this->validate($request, [
            'no_kendaraan' => 'required',
            'no_plat' => 'required',
            'jenis_kendaraan' => 'required',
            'jumlah_penumpang' => 'required',
            'id_jalur' => 'required'
        ]);

        $input = $request->all();
        $update->fill($input)->save();

        return redirect('admin/kendaraan')->with('success','Layanan update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy(kendaraan $kendaraan, $id)
    {
        kendaraan::find($id)->delete();
        return redirect('admin/kendaraan')->with('success','Driver successfully deleted');
    }
}
