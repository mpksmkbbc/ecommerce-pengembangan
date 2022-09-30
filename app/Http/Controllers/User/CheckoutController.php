<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Models\City;
use App\Models\District;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function CheckoutCreate(){
        // jika data keranjang lebih dari 0 atau ada
        if (Cart::total() > 0) {
            // jalankan syntak berikut
            $carts = Cart::content();
            $cartQty = Cart::count();
            $cartTotal = Cart::total();

            $provinces = Province::orderBy('province_name','ASC')->get();

            return view('frontend.checkout', compact('carts','cartQty','cartTotal','provinces'));
        } else {
            // jika data keranjang 0 atau tidak ada
            $notification = array(
                'message' => 'Belanja Minimal Satu Produk',
                'alert-type' => 'error'
            );
    
            return redirect()->back()->with($notification);
        }
    }

    public function CityGetAjax($province_id){
    	$ship = City::where('province_id',$province_id)->orderBy('city_name','ASC')->get();
    	return json_encode($ship);

    } 
    public function DistrictGetAjax($city_id){
    	$ship = District::where('city_id',$city_id)->orderBy('district_name','ASC')->get();
    	return json_encode($ship);
    } 

    // Method untuk proses simpan data 
    public function CheckoutStore(Request $request){
    	// dd($request->all());

        $data = array();
    	$data['shipping_name'] = $request->shipping_name;
    	$data['shipping_email'] = $request->shipping_email;
    	$data['shipping_phone'] = $request->shipping_phone;
    	$data['post_code'] = $request->post_code;
    	$data['province_id'] = $request->province_id;
    	$data['city_id'] = $request->city_id;
    	$data['district_id'] = $request->district_id;
    	$data['address'] = $request->address;
    	$cartTotal = Cart::total();

        // jika metode bayar yang dipilih stripe
    	if ($request->payment_method == 'stripe') {
            // tampilkan halaman stripe dan passing data array dan cartTotal
    		return view('frontend.payments.stripe', compact('data','cartTotal'));
    	}elseif ($request->payment_method == 'cash') {
            // tampilkan halaman cash dan passing data array dan cartTotal
            return view('frontend.payments.cod', compact('data','cartTotal'));
    	}else{
            // tampilkan halaman manual dan passing data array dan cartTotal
            return view('frontend.payments.manual', compact('data','cartTotal'));
    	}
    }
}