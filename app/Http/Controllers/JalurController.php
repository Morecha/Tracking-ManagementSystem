<?php

namespace App\Http\Controllers;

use App\Models\jalur;
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
        $jalur = DB::table('jalurs')
                    ->join('haris', 'haris.id', '=', 'jalurs.hari')
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
    public function edit(jalur $jalur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\jalur  $jalur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, jalur $jalur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jalur  $jalur
     * @return \Illuminate\Http\Response
     */
    public function destroy(jalur $jalur)
    {
        //
    }
}
