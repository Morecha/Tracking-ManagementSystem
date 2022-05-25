<?php

namespace App\Http\Controllers;

use App\Models\jalur;
use App\Models\penumpang;
use Illuminate\Http\Request;

class PenumpangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $penumpang = penumpang::orderby('id_jalur')->get();
        $penumpang = penumpang::join("jalurs", function ($join) {
                $join->on("jalurs.id","=","penumpangs.id_jalur");
                })->get();
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function destroy(penumpang $penumpang)
    {
        //
    }
}
