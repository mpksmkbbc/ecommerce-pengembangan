<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;

use Illuminate\Http\Request;
use Carbon\Carbon;

class CouponController extends Controller
{
    // Method untuk menampilkan halaman kelola kupon
    public function CouponView(){
    	$coupons = Coupon::orderBy('id','DESC')->get();
    	return view('backend.coupons.coupon',compact('coupons'));
    }

    // Method untuk proses menambahkan data kupon
    public function CouponStore(Request $request){
        // validasi data
    	$request->validate([
    		'coupon_name' => 'required',
    		'coupon_discount' => 'required',
    		'coupon_validity' => 'required',
    	], [
            'coupon_name.required' => 'Mohon diisi nama kupon',
            'coupon_name.required' => 'Mohon diisi diskon kupon',
            'coupon_name.required' => 'Mohon diisi validasi tanggal',
        ]);

        // method insert() menerima array dari atribut dan melakukan proses insert data ke database
        Coupon::insert([
            // fungsi strtoupper digunakan untk mengubah string menjadi huruf kapital
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount, 
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now(),
        ]);

        // toastr notification
	    $notification = array(
			'message' => 'Kupon Berhasil Ditambah',
			'alert-type' => 'success'
		);

        // redirect halaman jika proses menambahkan data berhasil
		return redirect()->back()->with($notification);
    }  

    // Method untuk menampilkan halaman edit kupon
    public function CouponEdit($id){
        // mengambil data coupon berdasarkan id
        // parameter $id merupakan model Coupon yang diambil datanya sesuai dengan ID yang di dapatkan dari URL.
        $coupons = Coupon::findOrFail($id);
        // setelah data tersebut di dapatkan, maka akan di parsing ke dalam view coupon-edit.blade.php di dalam folder coupons dengan menggunakan helper compact.
    	return view('backend.coupons.coupon-edit', compact('coupons'));
    }

    // Method untuk proses update data kupon
    public function CouponUpdate(Request $request, $id){

        Coupon::findOrFail($id)->update([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount, 
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now(),
    	]);

	    $notification = array(
			'message' => 'Kupon Berhasil Diperbarui',
			'alert-type' => 'info'
		);

		return redirect()->route('manage.coupon')->with($notification);
    }

    // Method untuk proses hapus data kupon
    public function CouponDelete($id){
        // data diambil berdasarkan id menggunakan method findOrFail(). 
        // setelah data ditemukan, gunakan method delete() untuk menghapus data.
    	Coupon::findOrFail($id)->delete();
    	$notification = array(
			'message' => 'Kupon Berhasil Di Hapus',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);
    }
}