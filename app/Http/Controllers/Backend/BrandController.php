<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand; // load model

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    // Method untuk menampilkan halaman merek
    public function BrandView()
    {
        // mengambil data brand dari database kemudian ditampung dalam variabel $brands
        // dan tampilkan datanya dari data terbaru menggunakan method latest()
        $brands = Brand::latest()->get(); 
        // menampilkan view brand.blade.php yang ada di folder brands dan folder brands terdapat di folder backend
        // kemudian passing data brands untuk ditampilkan ke halaman brand.blade.php dengan menuliskan di parameter kedua method view() menggunakan helper compact() 
        return view('backend.brands.brand', compact('brands')); 
    }

    // Method untuk proses menambahkan data ke database
    public function BrandStore(Request $request)
    {
        // validasi data
        $request->validate([
            'brand_name' => 'required',
            'brand_image' => 'required',
        ], [
            'brand_name.required' => 'Mohon diisi nama Merek',
        ]);

        // variabel image berisikan gambar yang direquest dari file yang namenya brand_image
        $image = $request->file('brand_image'); 
        // variabel name_gen berisikan nama gambar yang akan disimpan ke database
        // buat kode unik menggunakan fungsi uniqid() kemudian konvert dari hexadecimal ke decimal menggunakan fungsi hexdec()
        // setelah itu ambil extension dari gambar yang diupload
        // contoh hasil 1726963965772172.jpeg 
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        // resize ukuran gambar yang diupload kemudian simpan ke direktori public\upload\brands dengan nama hasil dari $name_gen
        Image::make($image)->resize(300, 300)->save('upload/brands/'.$name_gen);
        // contoh hasil yang akan tersimpan di database : upload/brands/1726963965772172.jpeg
        $save_url = 'upload/brands/' . $name_gen;

        // method insert() menerima array dari atribut dan melakukan proses insert data ke database
        Brand::insert([
            'brand_name' => $request->brand_name,
            // fungsi strtolower() digunakan untuk mengubah string menjadi huruf kecil
            // fungsi str_replace untuk menggantikan beberapa karakter dalam sebuah string
            // jika ada spasi di string brand_name ganti menggunakan tanda - 
            // contoh hasil(tanpa spasi) : adidas
            // contoh hasil(dengan spasi) : sepatu-adidas
            'brand_slug' => strtolower(str_replace(' ', '-', $request->brand_name)), 
            'brand_image' => $save_url,
        ]);

        // toastr notification
        $notification = array(
            'message' => 'Merek Berhasil Ditambahkan!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    // Method untuk menampilkan halaman edit merek
    public function BrandEdit($id) {
        // mengambil data brand berdasarkan id
        // parameter $id merupakan model Brand yang diambil datanya sesuai dengan ID yang di dapatkan dari URL.
        $brands = Brand::findOrFail($id);  
        // setelah data tersebut di dapatkan, maka akan di parsing ke dalam view brand-edit.blade.php di dalam folder brands dengan menggunakan helper compact.
        return view('backend.brands.brand-edit', compact('brands'));
    }

    // Method untuk proses update data merek
    public function BrandUpdate(Request $request) {
        // mengambil data brand yang direquest dengan name id dan name old_image
        $brand_id = $request->id;
        $old_img = $request->old_image;
        
        // jika ada request file dengan name brand_image
        if ($request->file('brand_image')) {
            // jalankan perintah berikut
            unlink($old_img);
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/brands/'.$name_gen);
            $save_url = 'upload/brands/' . $name_gen;
    
            Brand::findOrFail($brand_id)->update([
                'brand_name' => $request->brand_name,
                'brand_slug' => strtolower(str_replace(' ', '-', $request->brand_name)),
                'brand_image' => $save_url,
            ]);
    
            $notification = array(
                'message' => 'Merek Berhasil Diperbarui!',
                'alert-type' => 'info'
            );
    
            return redirect()->route('brand.view')->with($notification);
        } else {
            // jika tidak ada request file dengan name brand_image, lakukan update tanpa meng-update kolom brand_image.
            Brand::findOrFail($brand_id)->update([
                'brand_name' => $request->brand_name,
                'brand_slug' => strtolower(str_replace(' ', '-', $request->brand_name)),
            ]);
    
            $notification = array(
                'message' => 'Merek Berhasil Diperbarui!',
                'alert-type' => 'info'
            );
    
            return redirect()->route('brand.view')->with($notification);
        }
    }

    // Method untuk menghapus data merek
    public function BrandDelete($id) {
        // proses menghapus gambar di folder public\upload\brands
        $brands = Brand::findOrFail($id);
        $img = $brands->brand_image;
        @unlink($img);
        
        // data diambil berdasarkan id menggunakan method findOrFail(). 
        // setelah data ditemukan, gunakan method delete() untuk menghapus data.
        Brand::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Brand Berhasil Dihapus!',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}
