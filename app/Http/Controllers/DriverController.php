<?php

namespace App\Http\Controllers;

use App\Models\driver;
use App\Models\kendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $driver = driver::join("kendaraans", function ($join) {
        //     $join->on("drivers.id_kendaraan","=","kendaraans.id");
        //     })->get();

        $driver = DB::table('kendaraans')
                    ->join('drivers', 'kendaraans.id','=','drivers.id_kendaraan')
                    ->orderBy('drivers.id_kendaraan')
                    ->get();

        return view('admin.driver', compact('driver'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kendaraan = kendaraan::orderby('id')->get();
        return view('admin.driver.create',compact('kendaraan'));
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
            'nama' => 'required',
            'NIP' => 'required',
            'contac_person' =>'required',
            'id_kendaraan' =>'required'
        ]);

        $input = $request->all();

        driver::create($input);

        return redirect('/admin/driver')->with('success','New Driver has been Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(driver $driver)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $driver = driver::find('id',$id);
        $driver = driver::find($id);
        $mobil = kendaraan::where('id',$driver->id_kendaraan)->first();
        $allmobil = kendaraan::orderby('id')->get();
        return view('admin.driver.edit',compact('driver','mobil','allmobil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = driver::find($id);
        $this->validate($request, [
            'nama' => 'required',
            'NIP' => 'required',
            'contac_person' => 'required',
            'id_kendaraan' => 'required'
        ]);
        $input = $request->all();
        $update->fill($input)->save();

        return redirect('admin/driver')->with('success','driver update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(driver $driver, $id)
    {
        driver::find($id)->delete();
        return redirect('admin/driver')->with('success','Driver successfully deleted');
    }
}
