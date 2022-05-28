<?php

namespace App\Http\Controllers;

use App\Models\posisi;
use App\Models\kendaraan;
use Illuminate\Http\Request;
use Bagusindrayana\LaravelMaps\LaravelMaps;
use BagusIndrayana\LaravelMaps\Leaflet\LeafletGeojson;
use BagusIndrayana\LaravelMaps\Leaflet\LeafletMarker;
use BagusIndrayana\LaravelMaps\Leaflet\LeafletPolygon;
use BagusIndrayana\LaravelMaps\Leaflet\LeafletCircle;
use Bagusindrayana\LaravelMaps\Mapbox\MapboxMarker;
use BagusIndrayana\LaravelMap\LaravelMap;
use BagusIndrayana\LaravelMap\MapBox\MapboxGeocoder;
use BagusIndrayana\LaravelMap\MapBox\Marker;
use BagusIndrayana\LaravelMap\MapBox\NavigationControl;
use BagusIndrayana\LaravelMap\MapBox\Popup;
use Illuminate\Support\Facades\DB;

class PosisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kendaraan = kendaraan::all();

            // dd($isian);
        $map = LaravelMaps::leaflet('map')
        ->setView([-1.550366, 119.345413], 5);

        foreach ($kendaraan as $kendaraan)
        {
            $isian = DB::table('posisis')
                    ->join('kendaraans','kendaraans.id','=','posisis.id_kendaraan')
                    ->where('posisis.id_kendaraan', $kendaraan->id)
                    ->orderBy('posisis.id', 'desc')
                    ->first();

            $map->addMarker(function(LeafletMarker $marker) use($isian){
                return $marker
                ->latLng([$isian->lat, $isian->long])
                ->bindPopup('<b>Hello world!</b><br>I am a popup.');
            });
        }

        return view('welcome',compact('map'));
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
     * @param  \App\Models\posisi  $posisi
     * @return \Illuminate\Http\Response
     */
    public function show(posisi $posisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\posisi  $posisi
     * @return \Illuminate\Http\Response
     */
    public function edit(posisi $posisi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\posisi  $posisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, posisi $posisi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\posisi  $posisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(posisi $posisi)
    {
        //
    }
}
