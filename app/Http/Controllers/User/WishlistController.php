<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class WishlistController extends Controller
{
    // Method untuk menambahkan produk ke wishlist
    public function AddToWishlist(Request $request, $product_id){
        if (Auth::check()) {
            $exists = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();

            if (!$exists) {
               Wishlist::insert([
                'user_id' => Auth::id(), 
                'product_id' => $product_id, 
                'created_at' => Carbon::now(), 
            ]);
                return response()->json(['success' => 'Produk Berhasil Ditambah Ke Wishlist']);
            }else{
                return response()->json(['error' => 'Produk Sudah Ditambahkan']);
            }            
        }else{
            return response()->json(['error' => 'Kamu Harus Login Terlebih Dahulu']);
        }
    } 

    // Method untuk menampilkan halaman wishlist
    public function WishlistView(){
		return view('frontend.mywishlist');
	}

    // Method untuk mengambil data wishlist
    public function GetWishlistProduct(){
		$wishlist = Wishlist::with('product')->where('user_id', Auth::id())->latest()->get();
		return response()->json($wishlist);
	} 

    // Method untuk menghapus data wishlist
    public function RemoveWishlistProduct($id){
		Wishlist::where('user_id',Auth::id())->where('id',$id)->delete();
		return response()->json(['success' => 'Produk Berhasil Di Hapus']);
	}
}