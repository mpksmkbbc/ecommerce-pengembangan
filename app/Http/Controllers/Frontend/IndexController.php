<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Slider;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
	// Method untuk menampilkan halaman user profile 
	public function UserProfile(){
		$id = Auth::user()->id; // ambil id user yang login dan tampung dalam variabel $id
		$user = User::find($id); // temukan id user yang login di tabel users dan tampung data user dalam variabel $user
		return view('frontend.profile.user-profile-view', compact('user'));
	}

	// Method untuk proses ubah profile user
	public function UserProfileStore(Request $request){
		$data = User::find(Auth::user()->id);
		$data->name = $request->name;
		$data->phone = $request->phone;
		$data->address = $request->address;
		$data->email = $request->email;

		if ($request->file('profile_photo_path')) {
			$file = $request->file('profile_photo_path');
			@unlink(public_path('upload/user-images/'.$data->profile_photo_path));
			$filename = date('YmdHi').$file->getClientOriginalName();
			$file->move(public_path('upload/user-images'),$filename);
			$data['profile_photo_path'] = $filename;
		}
		$data->save();

		// Toastr Notification
		$notification = array(
			'message' => 'User Profil Berhasil Diperbarui',
			'alert-type' => 'success'
		);

		// redirect halaman jika user profile berhasil diubah
		return redirect()->route('dashboard')->with($notification);
	} 

	// Method untuk menampilkan halaman ubah password 
	public function UserChangePassword(){
		$id = Auth::user()->id;
		$user = User::find($id);
		return view('frontend.profile.user-change-password', compact('user'));
	}

	// Method untuk mengubah password user
	public function UserPasswordUpdate(Request $request){
		// validasi data
		$validateData = $request->validate([
			'oldpassword' => 'required',
			'password' => 'required|confirmed',
		]);

		$hashedPassword = Auth::user()->password;
		// jika password lama sesuai dengan yang ada di database 
		if (Hash::check($request->oldpassword,$hashedPassword)) {
			// temukan id user yang login
			$user = User::find(Auth::id());
			// kemudian ubah data password dengan password baru yang diinputkan
			$user->password = Hash::make($request->password);
			$user->save();
			Auth::logout();
			// jika berhasil ubah password akan diredirect ke halaman login
			return redirect()->route('user.logout');
		}else{
			// jika ubah password tidak berhasil akan diredirect ke halaman ubah password
			return redirect()->back();
		}
	}

	// Method untuk proses logout user
	public function UserLogout(){
		Auth::logout();
		return Redirect()->route('login'); // jika user logout akan diarahkan ke halaman login
	}

	// Method untuk menampilkan halaman landing page
	public function index(){
		// memanggil model Slider kemudian ambil data slider dengan status 1/true/aktif kemudian mengurutkan datanya secara ascending atau dari yang terkecil ke yang terbesar
		// setelah itu batasi data yang ditampilkan dengan fungsi limit()
		$sliders = Slider::where('status', 1)->orderBy('id','ASC')->limit(3)->get();
		$categories = Category::orderBy('category_name','ASC')->get();
		$products = Product::where('product_status', 1)->orderBy('id','ASC')->limit(10)->get();

		// memanggil model Product kemudian ambil data produk dengan kolom product_status berisi 1 dan kolom new_product berisi 1 
		$new_product = Product::where('product_status', 1)->where('new_product', 1)->orderBy('id','DESC')->limit(6)->get();
		$new_arrival = Product::where('product_status', 1)->where('new_arrival', 1)->orderBy('id','DESC')->limit(6)->get();
		$best_seller = Product::where('product_status', 1)->where('best_seller', 1)->orderBy('id','DESC')->limit(10)->get();
		$product_promo = Product::where('product_status', 1)->where('product_promo', 1)->where('product_discount','!=',NULL)->orderBy('id','DESC')->limit(4)->get();
		// memanggil view dengan nama home.blade.php yang ada di folder resources\views\frontend  
		// passing data ke dalam view menggunakan helper compact()
		return view('frontend.home', compact('categories','products','sliders','new_product','new_arrival','best_seller','product_promo'));
	}

	// Method untuk menampilkan halaman detail produk
	public function ProductDetails($id,$slug){
		// mengambil data product berdasarkan id 
    // parameter $id merupakan model Product yang diambil datanya sesuai dengan ID yang didapatkan dari URL.
    // parameter $slug merupakan model Product yang diambil datanya sesuai dengan product_slug yang didapatkan dari URL.
		$product = Product::findOrFail($id);

		$color = $product->product_color;
		$product_color = explode(',', $color);

		$size = $product->product_size;
		$product_size = explode(',', $size);

		$product_galleries = ProductGallery::where('product_id',$id)->get();

		$cat_id = $product->category_id;
		$related_product = Product::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->get();
    // memanggil view dengan nama product-details.blade.php yang ada di folder resources\views\frontend\products
    // passing data ke dalam view menggunakan helper compact()
	 	return view('frontend.products.product-details', compact('product', 'product_color', 'product_size', 'product_galleries', 'related_product'));
	}

	// Method untuk menampilkan halaman tag produk
	public function TagWiseProduct($tag){
		$products = Product::where('product_status', 1)->where('product_tags', $tag)->orderBy('id','DESC')->paginate(6);
		$categories = Category::orderBy('category_name','ASC')->get();

		return view('frontend.products.product-tags-view',compact('products', 'categories'));
	}

	// Method untuk menampilkan halaman sub kategori produk
	public function SubCatWiseProduct(Request $request, $subcat_id, $slug){
		$products = Product::where('product_status', 1)->where('subcategory_id', $subcat_id)->orderBy('id','DESC')->paginate(6);
		$categories = Category::orderBy('category_name','ASC')->get();

		$breadsubcat = SubCategory::with(['category'])->where('id',$subcat_id)->get();

		return view('frontend.products.subcategory-view', compact('products','categories','breadsubcat'));
	}

	// Method untuk menampilkan halaman sub-sub kategori produk
	public function SubSubCatWiseProduct(Request $request, $subsubcat_id, $slug){
		$products = Product::where('product_status', 1)->where('subsubcategory_id', $subsubcat_id)->orderBy('id','DESC')->paginate(6);
		$categories = Category::orderBy('category_name','ASC')->get();

		$breadsubsubcat = SubSubCategory::with(['category','subcategory'])->where('id',$subsubcat_id)->get();

		return view('frontend.products.subsubcategory-view', compact('products','categories','breadsubsubcat'));
	}

	// Method untuk proses cari dan menampilkan halamannya
	public function search(Request $request){
		// validasi data
		$request->validate(["search" => "required"]);

		// variabel $item menampung data yang diinputkan
		$item = $request->search;
		//echo "$item"; // menampilkan data cari

    $categories = Category::orderBy('category_name','ASC')->get();
		// cari data produk yang memiliki nama yang sama dengan data $item
		$products = Product::where('product_name','LIKE',"%$item%")->orderBy('id','DESC')->paginate(6);

		return view('frontend.products.search', compact('products','categories'));
	} 

	public function SearchProduct(Request $request){

		$request->validate(["search" => "required"]);

		$item = $request->search;		 
        
		$products = Product::where('product_name','LIKE',"%$item%")->select('product_name','product_thumbnail','product_price','id','product_slug')->limit(5)->get();
		return view('frontend.products.search-product', compact('products'));
	}

	// Method untuk menampilkan data produk dengan ajax
	public function ProductViewAjax($id){
		$product = Product::with('category','brand')->findOrFail($id);

		$color = $product->product_color;
		$product_color = explode(',', $color);

		$size = $product->product_size;
		$product_size = explode(',', $size);

		return response()->json(array(
			'product' => $product,
			'color' => $product_color,
			'size' => $product_size,
		));
	} 

}