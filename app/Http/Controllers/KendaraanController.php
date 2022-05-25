<?php

namespace App\Http\Controllers;

use App\Models\kendaraan;
use App\Models\jalur;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kendaraan = kendaraan::join("jalurs", function ($join) {
            $join->on("jalurs.id","=","kendaraans.id_jalur");
            })->get();

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
    public function edit(kendaraan $kendaraan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kendaraan $kendaraan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy(kendaraan $kendaraan)
    {
        //
    }
}
