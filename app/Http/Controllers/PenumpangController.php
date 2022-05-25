<?php

namespace App\Http\Controllers;

use App\Models\jalur;
use App\Models\penumpang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenumpangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $penumpang = DB::table('penumpangs')
                    ->join('jalurs', 'jalurs.id', '=', 'penumpangs.id_jalur')
                    ->join('haris', 'haris.id', '=', 'jalurs.hari')
                    ->orderBy('haris.id')
                    ->orderBy('keberangkatan')
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
