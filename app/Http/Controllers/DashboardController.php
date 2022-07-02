<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Activitylog\Models\Activity;
use App\Http\Requests\SettingRequest;
use Bagusindrayana\LaravelMaps\LaravelMaps;
use BagusIndrayana\LaravelMaps\Leaflet\LeafletMarker;
use App\Models\kendaraan;
use App\Models\posisi;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    /**
    * Show dashboard
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $kendaraan = kendaraan::all();
        $posisi = posisi::all();

        $map = LaravelMaps::leaflet('map')
        ->setView([-1.550366, 119.345413], 5);

        foreach ($kendaraan as $kendaraan)
        {
            $isian = DB::table('posisis')
                    ->join('kendaraans','kendaraans.id','=','posisis.id_kendaraan')
                    ->where('posisis.id_kendaraan', $kendaraan->id)
                    ->orderBy('posisis.id', 'desc')
                    ->first();
            if(isset($isian->latitude))
            {
                $map->addMarker(function(LeafletMarker $marker) use($isian){
                    return $marker
                    ->latLng([$isian->latitude, $isian->longitude])
                    ->bindPopup('<b>'.$isian->no_plat.' </b><br>
                                    Jenis Kendaraan : '.$isian->jenis_kendaraan.'<br>
                                    <a href="tracking/'.$isian->id.'"> Track Now <a>');
                });
            }
        }

        $driver = DB::table('drivers')->count();
        $transaksi = DB::table('penumpangs')->count();
        $jalur = DB::table('jalurs')->count();
        $transportasi = DB::table('kendaraans')->count();
        $logs = Activity::where('causer_id', auth()->id())->latest()->paginate(5);

        return view('admin.dashboard', compact('logs','map','driver','transaksi','jalur','transportasi'));
    }

    /**
    * Show activity logs
    *
    * @return \Illuminate\Http\Response
    */
    public function activity_logs()
    {
        $logs = Activity::where('causer_id', auth()->id())->latest()->paginate(10);

        return view('admin.logs', compact('logs'));
    }

	/**
	* Store settings into database
	*
	* @param $request
    * @return \Illuminate\Http\Response
	*/
    public function settings_store(SettingRequest $request)
    {
    	// when you upload a logo image
        // dd($request);
    	if($request->file('logo')) {
	    	$filename = $request->file('logo')->getClientOriginalName();
	    	$filePath = $request->file('logo')->storeAs('uploads', $filename, 'public');
	    	setting()->set('logo', $filePath);
    	}

    	setting()->set('site_name', $request->site_name);
    	setting()->set('keyword', $request->keyword);
    	setting()->set('description', $request->description);
    	// setting()->set('url', $request->link_url);

    	// save all
    	setting()->save();
    	return redirect()->back()->with('success', 'Settings has been successfully saved');
    }

    /**
    * Update profile user
    *
    * @param $request
    * @return \Illuminate\Http\Response
    */
    public function profile_update(Request $request)
    {
        $data = ['name' => $request->name];

        // if password want to change
        if($request->old_password && $request->new_password) {
            // verify if password is match
            if(!Hash::check($request->old_password, auth()->user()->password)) {
                session()->flash('failed', 'Password is wrong!');
                return redirect()->back();
            }

            $data['password'] = Hash::make($request->new_password);
        }

        // for update avatar
        if($request->avatar) {
            $data['avatar'] = $request->avatar;

            if(auth()->user()->avatar) {
                unlink(storage_path('app/public/'.auth()->user()->avatar));
            }
        }

        // update profile
        auth()->user()->update($data);

        return redirect()->back()->with('success', 'Profile updated!');
    }

    /**
    * Store avatar images into database
    *
    * @param $request
    * @return string
    */
    public function upload_avatar(Request $request)
    {
        $request->validate(['avatar'  => 'file|image|mimes:jpg,png,svg|max:1024']);

        if($request->hasFile('avatar')){
            $file = $request->file('avatar');

            $fileName = $file->getClientOriginalName();
            $folder = 'user-'.auth()->id();

            $file->storeAs('avatars/'.$folder, $fileName, 'public');

            return 'avatars/'.$folder.'/'.$fileName;
        }

        return '';

    }

    public function delete_logs()
    {
        $logs = Activity::where('causer_id',auth()->id())->delete();
        // $logs = Activity::where('created_at', '<=', Carbon::now()->subWeeks())->delete();

        return back()->with('success', $logs.' Logs successfully deleted!');
    }
}
