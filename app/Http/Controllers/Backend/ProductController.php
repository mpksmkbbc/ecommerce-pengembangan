<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Product;
use App\Models\ProductGallery;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class ProductController extends Controller
{
    // Method untuk menampilkan halaman tambah produk
    public function AddProduct() {
        // mengambil data brand dari database kemudian ditampung dalam variabel $brands
        // dan tampilkan datanya dari data terbaru menggunakan method latest()
        $brands = Brand::latest()->get();
        // mengambil data category dari database kemudian ditampung dalam variabel $categories
        // dan tampilkan datanya dari data terbaru menggunakan method latest()
        $categories = Category::latest()->get();
        // memanggil view dengan nama product-add.blade.php yang ada di folder resources\views\products  
        // kemudian passing data $brands dan $categories untuk ditampilkan ke halaman product-add.blade.php dengan menuliskan di parameter kedua method view() menggunakan helper compact()
        return view('backend.products.product-add', compact('brands','categories'));
    }

    // Method untuk proses tambah data
    public function ProductStore(Request $request) {
        // proses penyimpanan gambar thumbnail  

        // variabel image berisikan gambar yang direquest dari file yang namenya product_thumbnail
        $image = $request->file('product_thumbnail');
        // variabel name_gen berisikan nama gambar yang akan disimpan ke database
        // buat kode unik menggunakan fungsi uniqid() kemudian konvert dari hexadecimal ke decimal menggunakan fungsi hexdec()
        // setelah itu ambil extension dari gambar yang diupload
        // contoh hasil 1726963965772172.jpeg 
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        // resize ukuran gambar yang diupload kemudian simpan ke direktori public\upload\brands dengan nama hasil dari $name_gen
    	Image::make($image)->resize(500,500)->save('upload/products/thumbnail/'.$name_gen);
        // contoh hasil yang akan tersimpan di database : upload/products/thumbnail/1726963965772172.jpeg
    	$save_url = 'upload/products/thumbnail/'.$name_gen;

        // method insert() menerima array dari atribut dan melakukan proses insert data ke database
        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,

            'product_name' => $request->product_name,
            'product_slug' =>  strtolower(str_replace(' ', '-', $request->product_name)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,
            'product_weight' => $request->product_weight,
            'product_price' => $request->product_price,
            'product_discount' => $request->product_discount,
            'product_short_desc' => $request->product_short_desc,
            'product_long_desc' => $request->product_long_desc,
            'product_promo' => $request->product_promo,
            'new_product' => $request->new_product,
            'new_arrival' => $request->new_arrival,
            'best_seller' => $request->best_seller,
  
            'product_thumbnail' => $save_url,
            'product_status' => 1,
            'created_at' => Carbon::now(),
        ]);

        // proses simpan data produk galleri

        // variabel images berisikan gambar yang direquest dari file yang namenya product_gallery
        $images = $request->file('product_gallery');
        foreach ($images as $img) {
            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(500,500)->save('upload/products/product-gallery/'.$make_name);
            $uploadPath = 'upload/products/product-gallery/'.$make_name;

            ProductGallery::insert([
                'product_id' => $product_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(), 
    	    ]);
        }

        // toastr notification
        $notification = array(
			'message' => 'Produk Berhasil Ditambahkan!',
			'alert-type' => 'success'
		);

        // redirect halaman jika proses menambahkan data berhasil
		return redirect()->route('manage.product')->with($notification);
    }

    // Method untuk menampilkan halaman kelola produk
    public function ManageProduct(){
		$products = Product::latest()->get();
		return view('backend.products.product-view',compact('products'));
	}

    // Method untuk menonaktifkan produk (tidak akan tampil di frontend)
    public function ProductInactive($id){
        // mengambil data produk berdasarkan id
        // parameter $id merupakan model Product yang diambil datanya sesuai dengan ID yang di dapatkan dari URL.
        // setelah data ditemukan, ubah data kolom product_status menjadi 0 menggunakan method update()
        Product::findOrFail($id)->update(['product_status' => 0]);
        $notification = array(
           'message' => 'Produk Nonaktif',
           'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    // Method untuk mengaktifkan produk (akan tampil di frontend)
    public function ProductActive($id){
        // mengambil data produk berdasarkan id
        // parameter $id merupakan model Product yang diambil datanya sesuai dengan ID yang di dapatkan dari URL. 
        // setelah data ditemukan, ubah data kolom product_status menjadi 1 menggunakan method update()
        Product::findOrFail($id)->update(['product_status' => 1]);
        $notification = array(
           'message' => 'Produk Aktif',
           'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    // Method untuk menampilkan halaman edit produk
    public function EditProduct($id){
        // mengambil data product_gallery berdasarkan id
        // parameter $id merupakan model ProductGallery yang diambil datanya sesuai dengan ID yang di dapatkan dari URL.
		$productGalleries = ProductGallery::where('product_id',$id)->get();
		$brands = Brand::latest()->get();
		$categories = Category::latest()->get();
		$subcategories = SubCategory::latest()->get();
		$subsubcategories = SubSubCategory::latest()->get();
        // mengambil data product berdasarkan id
        // parameter $id merupakan model Product yang diambil datanya sesuai dengan ID yang di dapatkan dari URL.
		$products = Product::findOrFail($id);
		return view('backend.products.product-edit', compact('brands','categories','subcategories','subsubcategories','products','productGalleries'));
	}

    // Method untuk proses update data produk
    public function ProductUpdate(Request $request){
        // variabel $product_id berisi id yang direquest dengan name id 
		$product_id = $request->id;

        // mengambil data berdasarkan id dari $product_id 
        // kemudian melakukan proses update ke database dengan method update()
        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,

            'product_name' => $request->product_name,
            'product_slug' =>  strtolower(str_replace(' ', '-', $request->product_name)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,
            'product_weight' => $request->product_weight,
            'product_price' => $request->product_price,
            'product_discount' => $request->product_discount,
            'product_short_desc' => $request->product_short_desc,
            'product_long_desc' => $request->product_long_desc,
            'product_promo' => $request->product_promo,
            'new_product' => $request->new_product,
            'new_arrival' => $request->new_arrival,
            'best_seller' => $request->best_seller,

            'product_status' => 1,
            'created_at' => Carbon::now(),
        ]);

        // toastr notification
        $notification = array(
			'message' => 'Data Produk Berhasil Diperbarui',
			'alert-type' => 'success'
		);

        // redirect halaman jika proses update data produk berhasil
		return redirect()->route('manage.product')->with($notification);
	}

    // Method untuk proses update gambar thumbnail
    public function ProductImageUpdate(Request $request){
       // mengambil data produk yang direquest dengan name id dan name old_img 
		$product_id = $request->id;
        $oldImage = $request->old_img;
        unlink($oldImage);

        $image = $request->file('product_thumbnail');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(500,500)->save('upload/products/thumbnail/'.$name_gen);
    	$save_url = 'upload/products/thumbnail/'.$name_gen;

    	Product::findOrFail($product_id)->update([
    		'product_thumbnail' => $save_url,
    		'updated_at' => Carbon::now(), 
    	]);
        
        $notification = array(
			'message' => 'Foto Produk Berhasil Diperbarui',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);
	}

    // Method untuk proses update produk galleri
    public function ProductGalleryUpdate(Request $request) {
        // variabel $imgs berisi id yang direquest dengan name product_gallery 
        $imgs = $request->product_gallery;

        // mengambil data kolom photo_name berdasarkan id yang didapat dari $imgs
		foreach ($imgs as $id => $img) {
            $imgDel = ProductGallery::findOrFail($id);
            unlink($imgDel->photo_name);
            
            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(500,500)->save('upload/products/product-gallery/'.$make_name);
            $uploadPath = 'upload/products/product-gallery/'.$make_name;

            ProductGallery::where('id',$id)->update([
                'photo_name' => $uploadPath,
                'updated_at' => Carbon::now(),
            ]);
	    }

        $notification = array(
			'message' => 'Galeri Produk Berhasil Diperbarui',
			'alert-type' => 'info'
		);

        return redirect()->back()->with($notification);
    }

    // Method untuk menghapus gambar produk galleri
    public function ProductGalleryDelete($id){
        $oldimg = ProductGallery::findOrFail($id);
        unlink($oldimg->photo_name);
        ProductGallery::findOrFail($id)->delete();

        $notification = array(
           'message' => 'Foto Berhasil Dihapus',
           'alert-type' => 'info'
       );

       return redirect()->back()->with($notification);
    }

    // Method untuk menghapus data produk sekaligus menghapus data produk galleri
    public function ProductDelete($id){
        $product = Product::findOrFail($id);
        unlink($product->product_thumbnail);
        Product::findOrFail($id)->delete();

        $images = ProductGallery::where('product_id',$id)->get();
        foreach ($images as $img) {
            unlink($img->photo_name);
            ProductGallery::where('product_id',$id)->delete();
        }

        $notification = array(
           'message' => 'Produk Berhasil Dihapus',
           'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function ProductStock(){
        $products = Product::latest()->get();
        return view('backend.products.product-stock',compact('products'));
    }

}