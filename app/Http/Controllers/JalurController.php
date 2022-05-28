<?php

namespace App\Http\Controllers;

use App\Models\jalur;
use App\Models\hari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JalurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jalur = DB::table('haris')
                    ->join('jalurs', 'haris.id', '=', 'jalurs.hari')
                    ->orderBy('haris.id')
                    ->get();
        return view('admin.jadwal',compact('jalur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hari = hari::orderby('id')->get();
        return view('admin.jadwal.create',compact('hari'));
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
            'kota_asal' => 'required',
            'kota_tujuan' => 'required',
            'harga' =>'required',
            'hari' =>'required',
            'keberangkatan' =>'required',
        ]);

        $input = $request->all();
        jalur::create($input);

        return redirect('/admin/jadwal')->with('success','Tempat created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\jalur  $jalur
     * @return \Illuminate\Http\Response
     */
    public function show(jalur $jalur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jalur  $jalur
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jalur = jalur::find($id);
        $hari = hari::where('id',$jalur->hari)->first();
        $allhari = hari::orderby('id')->get();
        return view('admin.jadwal.edit', compact('jalur','hari','allhari'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\jalur  $jalur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = jalur::find($id);
        $this->validate($request, [
            'kota_asal' => 'required',
            'kota_tujuan' => 'required',
            'harga' => 'required',
            'keberangkatan' => 'required',
            'hari' => 'required'
        ]);

        $input = $request->all();
        $update->fill($input)->save();

        return redirect('admin/jadwal')->with('success','Jadwal update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jalur  $jalur
     * @return \Illuminate\Http\Response
     */
    public function destroy(jalur $jalur, $id)
    {
        jalur::find($id)->delete();
        return redirect('admin/jadwal')->with('success','Jadwal successfully deleted');
    }
}
