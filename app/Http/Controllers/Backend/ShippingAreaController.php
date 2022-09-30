<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Models\City;
use App\Models\District;

use Illuminate\Http\Request;
use Carbon\Carbon;

class ShippingAreaController extends Controller
{
    // Fungsi untuk menampilkan halaman data provinsi
	public function ProvinceView(){
		$provinces = Province::orderBy('id','ASC')->get();
		return view('backend.ship.province', compact('provinces'));
	}

    // Fungsi untuk proses menyimpan data provinsi
    public function ProvinceStore(Request $request){
    	$request->validate([
    		'province_name' => 'required',   	 
    	]);

	    Province::insert([
            'province_name' => $request->province_name,
            'created_at' => Carbon::now(),
    	]);

	    $notification = array(
			'message' => 'Data Berhasil Ditambah',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    }

    // Fungsi untuk menampilkan halaman edit provinsi
    public function ProvinceEdit($id){
        $provinces = Province::findOrFail($id);
	    return view('backend.ship.province-edit',compact('provinces'));
    }

    // Fungsi untuk proses edit provinsi
    public function ProvinceUpdate(Request $request,$id){
    	Province::findOrFail($id)->update([
            'province_name' => $request->province_name,
            'created_at' => Carbon::now(),
    	]);

	    $notification = array(
			'message' => 'Data Berhasil Diperbarui',
			'alert-type' => 'info'
		);

		return redirect()->route('manage.province')->with($notification);
    } 

    // Fungsi untuk proses hapus provinsi
    public function ProvinceDelete($id){
    	Province::findOrFail($id)->delete();

    	$notification = array(
			'message' => 'Data Berhasil Dihapus',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);
    }  

    // Start City Controller //
    // Fungsi untuk menampilkan halaman data kota
    public function CityView(){
        $province = Province::orderBy('province_name','ASC')->get();
        $city = City::with('province')->orderBy('id','DESC')->get();
		    return view('backend.ship.city',compact('province','city'));
    }

    // Method untuk proses menambahkan data kota
    public function CityStore(Request $request){
        // validasi data
    	$request->validate([
    		'province_id' => 'required',  
    		'city_name' => 'required',  	 
    	],[
            'province_id' => 'Mohon pilih provinsi',  
    		'city_name' => 'Mohon isi nama kota', 
        ]);

        // proses insert data ke database
        City::insert([
            'province_id' => $request->province_id,
            'city_name' => $request->city_name,
            'created_at' => Carbon::now(),
    	]);

	    $notification = array(
			'message' => 'Data Berhasil Ditambah',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    } 

    // Method untuk menampilkan halaman edit kota
    public function CityEdit($id){
        // memanggil model Province kemudian mengambil data kolom province_name
        $province = Province::orderBy('province_name','ASC')->get();
        // mengambil data product berdasarkan id
        // parameter $id merupakan model City yang diambil datanya sesuai dengan ID yang di dapatkan dari URL.
        $city = City::findOrFail($id);
        // memanggil view dengan nama city-edit.blade.php yang ada di folder resources\views\ship
        // passing data city dan province ke dalam view menggunakan helper compact()
	    return view('backend.ship.city-edit',compact('city','province'));
    }

    // Method untuk proses edit data kota
    public function CityUpdate(Request $request,$id){
    	City::findOrFail($id)->update([
            'province_id' => $request->province_id,
            'city_name' => $request->city_name,
            'created_at' => Carbon::now(),
    	]);

	    $notification = array(
			'message' => 'Data Berhasil Diperbarui',
			'alert-type' => 'info'
		);

		return redirect()->route('manage.city')->with($notification);
    }

    // Method untuk menghapus data kota
    public function CityDelete($id){
    	City::findOrFail($id)->delete();

    	$notification = array(
			'message' => 'Data Berhasil Dihapus',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);
    }

    // Start District Controller//
    // Method untuk menampilkan halaman data kecamatan
    public function DistrictView(){
      $province = Province::orderBy('province_name','ASC')->get();
      $city = City::orderBy('city_name','ASC')->get();
      $district = District::with('province','city')->orderBy('id','ASC')->get();

      return view('backend.ship.district', compact('province','city','district'));
    }

    // Method untuk proses menyimpan data kecamatan
    public function DistrictStore(Request $request){
      $request->validate([
        'province_id' => 'required',  
        'city_id' => 'required', 
        'district_name' => 'required', 	 
      ]);

      District::insert([
        'province_id' => $request->province_id,
        'city_id' => $request->city_id,
        'district_name' => $request->district_name,
        'created_at' => Carbon::now(),
      ]);

      $notification = array(
        'message' => 'Data berhasil Ditambah',
        'alert-type' => 'success'
      );

      return redirect()->back()->with($notification);
    }

    // Method Fungsi untuk menampilkan halaman edit kecamatan
    public function DistrictEdit($id){
      $province = Province::orderBy('province_name','ASC')->get();
      $city = City::orderBy('city_name','ASC')->get();
      $district = District::findOrFail($id);
      return view('backend.ship.district-edit',compact('province','city','district'));
    }

    // Method untuk proses edit data kecamatan
    public function DistrictUpdate(Request $request,$id){
    	District::findOrFail($id)->update([
        'province_id' => $request->province_id,
        'city_id' => $request->city_id,
        'district_name' => $request->district_name,
        'created_at' => Carbon::now(),
    	]);

	    $notification = array(
        'message' => 'Data Berhasil Diperbarui',
        'alert-type' => 'info'
      );

		  return redirect()->route('manage.district')->with($notification);
    }

    // Method untuk menghapus data kecamatan
    public function DistrictDelete($id){
    	District::findOrFail($id)->delete();
    	$notification = array(
        'message' => 'Data Berhasil Dihapus',
        'alert-type' => 'info'
      );

      return redirect()->back()->with($notification);
    } 
}