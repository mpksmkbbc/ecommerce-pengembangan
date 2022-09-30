<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Mail\OrderMail;

use Intervention\Image\Facades\Image;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon; 

class PaymentController extends Controller
{
    public function PayStripe(Request $request){
    	if (Session::has('coupon')) {
    		$total_amount = Session::get('coupon')['total_amount'];
    	}else{
    		$total_amount = round(Cart::total());
    	}
 
        \Stripe\Stripe::setApiKey('sk_test_51Kbgu6CN92UgdufCGsRz1gZRNXm6G3xE9mPiKoxnA1AI6wqxOyBmg4EYh0y15aKblmaUxfir7l1QRhv1tqAxFHeB00FTl9ASUZ');

        $token = $_POST['stripeToken'];
        $charge = \Stripe\Charge::create([
            'amount' => $total_amount*100,
            'currency' => 'usd',
            'description' => 'Salza Store',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);

	    // dd($charge);

        // syntak insert data ke tabel order
        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'province_id' => $request->province_id,
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'poscode' => $request->post_code,
            'address' => $request->address,
   
            'payment_method' => 'Stripe',
            'transaction_id' => $charge->balance_transaction,
            'amount' => $total_amount,

            'order_number' => $charge->metadata->order_id,
            'invoice_number' => 'ESZ'.mt_rand(10000000,99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'shipping_status' => 'Ditunda',
            'created_at' => Carbon::now(),	 
        ]);

        // syntak insert data ke tabel order item
        $carts = Cart::content();
        foreach ($carts as $cart) {
            OrderItem::insert([
                'order_id' => $order_id, 
                'product_id' => $cart->id,
                'color' => $cart->options->color,
                'size' => $cart->options->size,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'created_at' => Carbon::now(),
            ]);
        }

        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        //  Email Notification 
        $invoice = Order::findOrFail($order_id);
        $data = [
            'invoice_number' => $invoice->invoice_number,
            'amount' => $total_amount,
            'name' => $invoice->name,
            'email' => $invoice->email,
        ];

        Mail::to($request->email)->send(new OrderMail($data));
   
        Cart::destroy();
   
        $notification = array(
            'message' => 'Terima kasih! Pesanan Berhasil Dibuat.',
            'alert-type' => 'success'
        );
   
        return redirect()->route('dashboard')->with($notification);
    }

    public function PayCash(Request $request){
    	if (Session::has('coupon')) {
    		$total_amount = Session::get('coupon')['total_amount'];
    	}else{
    		$total_amount = round(Cart::total());
    	}

	    // dd($charge);

        // syntak insert data ke tabel order
        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'province_id' => $request->province_id,
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'poscode' => $request->post_code,
            'address' => $request->address,
   
            'payment_method' => 'Cash On Delivery',
            'amount' => $total_amount,

            'order_number' => mt_rand(10000000,99999999),
            'invoice_number' => 'ESZ'.mt_rand(10000000,99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'shipping_status' => 'Ditunda',
            'created_at' => Carbon::now(),	 
        ]);

        // syntak insert data ke tabel order item
        $carts = Cart::content();
        foreach ($carts as $cart) {
            OrderItem::insert([
                'order_id' => $order_id, 
                'product_id' => $cart->id,
                'color' => $cart->options->color,
                'size' => $cart->options->size,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'created_at' => Carbon::now(),
            ]);
        }

        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        //  Email Notification 
        $invoice = Order::findOrFail($order_id);
        $data = [
            'invoice_number' => $invoice->invoice_number,
            'amount' => $total_amount,
            'name' => $invoice->name,
            'email' => $invoice->email,
        ];

        Mail::to($request->email)->send(new OrderMail($data));

        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        Cart::destroy();

        $notification = array(
            'message' => 'Terima kasih! Pesanan Berhasil Dibuat.',
            'alert-type' => 'success'
        );

		return redirect()->route('dashboard')->with($notification);
    }

    public function PayManual(Request $request){
    	if (Session::has('coupon')) {
    		$total_amount = Session::get('coupon')['total_amount'];
    	}else{
    		$total_amount = round(Cart::total());
    	}

	    // dd($charge);

        // syntak insert data ke tabel order
        $image = $request->file('bukti_pembayaran');
    	$name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
    	Image::make($image)->resize(500,637)->save('upload/orders/'.$name_gen);
    	$save_url = 'upload/orders/'.$name_gen;

        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'province_id' => $request->province_id,
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'poscode' => $request->post_code,
            'address' => $request->address,
   
            'payment_method' => 'Bank Transfer Manual',
            'amount' => $total_amount,
            'bukti_pembayaran' => $save_url,

            'order_number' => mt_rand(10000000,99999999),
            'invoice_number' => 'ESZ'.mt_rand(10000000,99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'shipping_status' => 'Ditunda',
            'created_at' => Carbon::now(),	 
        ]);

        // syntak insert data ke tabel order item
        $carts = Cart::content();
        foreach ($carts as $cart) {
            OrderItem::insert([
                'order_id' => $order_id, 
                'product_id' => $cart->id,
                'color' => $cart->options->color,
                'size' => $cart->options->size,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'created_at' => Carbon::now(),
            ]);
        }

        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        //  Email Notification 
        $invoice = Order::findOrFail($order_id);
        $data = [
            'invoice_number' => $invoice->invoice_number,
            'amount' => $total_amount,
            'name' => $invoice->name,
            'email' => $invoice->email,
        ];

        Mail::to($request->email)->send(new OrderMail($data));

        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        Cart::destroy();

        $notification = array(
            'message' => 'Terima kasih! Pesanan Berhasil Dibuat.',
            'alert-type' => 'success'
        );

		return redirect()->route('dashboard')->with($notification);
    }
}