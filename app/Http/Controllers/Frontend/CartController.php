<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Method untuk proses menambahkan produk ke keranjang
    public function AddToCart(Request $request, $id){
        // mendapatkan data produk berdasarkan id
       $product = Product::findOrFail($id);

       // jika data product_discount bernilai null atau tidak ada
       if ($product->product_discount == NULL) {
           // jalankan syntak berikut
           Cart::add([
               'id' => $id, 
               'name' => $request->product_name, 
               'qty' => $request->quantity, 
               'price' => $product->product_price, // harga produk
               'weight' => 1, 
               'options' => [
                   'image' => $product->product_thumbnail,
                   'color' => $request->color,
                   'size' => $request->size,
               ], 
           ]);
           // tampilkan notifikasi berhasil ditambahkan
           return response()->json(['success' => 'Produk Berhasil Ditambah Ke Keranjang']);
       }else{
           // jika data product_discount ada
           // jalankan syntak berikut
           Cart::add([
               'id' => $id, 
               'name' => $request->product_name, 
               'qty' => $request->quantity, 
               'price' => $product->product_discount, // harga diskon
               'weight' => 1, 
               'options' => [
                   'image' => $product->product_thumbnail,
                   'color' => $request->color,
                   'size' => $request->size,
               ],
           ]);
           // tampilkan notifikasi berhasil ditambahkan
           return response()->json(['success' => 'Produk Berhasil Ditambah Ke Keranjang']);
       }
   } 

   public function AddMiniCart(){
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => round($cartTotal),

        ));
    }

    public function RemoveMiniCart($rowId){
    	Cart::remove($rowId);
    	return response()->json(['success' => 'Produk Dihapus dari Keranjang']);
    }
}