<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category; // load model category
use App\Models\SubCategory; // load model subcategory
use App\Models\SubSubCategory; // load model subsubcategory

use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function SubCategoryView()
    {
        // memanggil model Category kemudian mengambil data kolom category_name
        $categories = Category::orderBy('category_name', 'ASC')->get();
        // memanggil model SubCategory kemudian mengurutkan datanya dari yang terbaru dengan method latest()
        $subcategories = SubCategory::latest()->get();
        // memanggil view dengan nama subcategory.blade.php yang ada di folder resources\views\categories  
        return view('backend.categories.subcategory', compact('categories', 'subcategories'));
    }

    // Method untuk proses menambahkan data
    public function SubCategoryStore(Request $request)
    {
        // validasi data
        $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required',
        ], [
            'category_id.required' => 'Mohon pilih salah satu Kategori',
            'subcategory_name.required' => 'Mohon diisi nama Sub Kategori',
        ]);

        // proses insert data ke database
        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),
        ]);

        // toastr notification
        $notification = array(
            'message' => 'Sub Kategori Berhasil Ditambahkan!',
            'alert-type' => 'success'
        );

        // redirect halaman jika data berhasil ditambahkan
        return redirect()->back()->with($notification);
    }

    // Method untuk menampilkan halaman edit data
    public function SubCategoryEdit($id) {
        // memanggil model Category kemudian mengambil data kolom category_name
        $categories = Category::orderBy('category_name', 'ASC')->get();
        // mengambil data kategori berdasarkan id
        // parameter $id merupakan model Kategori yang diambil datanya sesuai dengan ID yang di dapatkan dari URL.
        $subcategories = SubCategory::findOrFail($id);
        // memanggil view dengan nama subcategory-edit.blade.php yang ada di folder resources\views\categories
        // passing data categories dan subcategories ke dalam view menggunakan helper compact()
        return view('backend.categories.subcategory-edit', compact('subcategories', 'categories'));
    }

    // Method untuk proses update data sub kategori
    public function SubCategoryUpdate(Request $request) {
        // variabel $subcategory_id berisi id yang direquest dengan name id
        $subcategory_id = $request->id;

        // mengambil data berdasarkan id dari $category_id 
        // kemudian melakukan proses update ke database dengan method update()
        SubCategory::findOrFail($subcategory_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),
        ]);

        // toastr notification
        $notification = array(
            'message' => 'Sub Kategori Berhasil Diperbarui!',
            'alert-type' => 'info'
        );

        // redirect halaman jika proses update berhasil
        return redirect()->route('subcategory.view')->with($notification);
    }

    // Method untuk proses hapus data sub kategori
    public function SubCategoryDelete($id) {
        // data diambil berdasarkan id menggunakan method findOrFail(). 
        // setelah data ditemukan, gunakan method delete() untuk menghapus data.
        SubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Sub Kategori Berhasil Dihapus!',
            'alert-type' => 'info'
        );

        // redirect halaman jika proses hapus berhasil
        return redirect()->back()->with($notification);
    }

    // All Method Sub-Sub Category //

    // Method untuk menampilkan halaman data sub-sub kategori
    public function SubSubCategoryView()
    {
        // memanggil model Category kemudian mengambil data kolom category_name
        $categories = Category::orderBy('category_name', 'ASC')->get();
        // memanggil model SubCategory kemudian mengambil data kolom subcategory_name
        $subcategories = SubCategory::orderBy('subcategory_name', 'ASC')->get();
        // memanggil model SubSubCategory kemudian mengurutkan datanya dari yang terbaru dengan method latest()
        $subsubcategories = SubSubCategory::latest()->get();
        // memanggil view dengan nama subsubcategory.blade.php yang ada di folder resources\views\categories  
        return view('backend.categories.subsubcategory', compact('categories', 'subcategories', 'subsubcategories'));
    }
    
    // Method untuk mengambil data subcategory menggunakan ajax
    public function GetSubCategory($category_id){
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name','ASC')->get();
        return json_encode($subcat);
    }
    
    // Method untuk mengambil data subsubcategory menggunakan ajax
    public function GetSubSubCategory($subcategory_id){
        $subsubcat = SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy('subsubcategory_name','ASC')->get();
        return json_encode($subsubcat);
    }

    // Method untuk proses menambahkan data sub-sub kategori
    public function SubSubCategoryStore(Request $request){
        // validasi data
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name' => 'required',
        ],[
            'category_id.required' => 'Mohon Pilih Kategori',
            'subcategory_id.required' => 'Mohon Pilih Sub Kategori',
            'subsubcategory_name.required' => 'Mohon Isi Sub-Sub Kategori',
        ]);

        // proses insert data ke database
        SubSubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name' => $request->subsubcategory_name,
            'subsubcategory_slug' => strtolower(str_replace(' ', '-',$request->subsubcategory_name)),
        ]);

        // toastr notification
        $notification = array(
            'message' => 'Sub-Sub Kategori Berhasil Ditambah',
            'alert-type' => 'success'
        );

        // redirect  halaman setelah proses tambah dan simpan berhasil
        return redirect()->back()->with($notification);
    }

    // Method untuk menampilkan halaman edit data 
    public function SubSubCategoryEdit($id){
        // memanggil model Category kemudian mengambil data kolom category_name
        $categories = Category::orderBy('category_name', 'ASC')->get();
        // memanggil model SubCategory kemudian mengambil data kolom subcategory_name
        $subcategories = SubCategory::orderBy('subcategory_name','ASC')->get();
        // mengambil data subsubkategori berdasarkan id
        // parameter $id merupakan model SubSubKategori yang diambil datanya sesuai dengan ID yang di dapatkan dari URL.
        $subsubcategories = SubSubCategory::findOrFail($id); 
        // memanggil view dengan nama subsubcategory-edit.blade.php yang ada di folder resources\views\categories
        // passing data categories, subcategories dan subsubcategories ke dalam view menggunakan helper compact()
        return view('backend.categories.subsubcategory-edit', compact('categories','subcategories','subsubcategories'));
    }

    // Method untuk proses update
    public function SubSubCategoryUpdate(Request $request){
        // variabel $category_id berisi id yang direquest dengan name id 
        $subsubcategory_id = $request->id;

        // mengambil data berdasarkan id dari $subsubcategory_id 
        // kemudian melakukan proses update ke database dengan method update()
        SubSubCategory::findOrFail($subsubcategory_id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name' => $request->subsubcategory_name,
            'subsubcategory_slug' => strtolower(str_replace(' ', '-',$request->subsubcategory_name)),
        ]);

        // toastr notification
        $notification = array(
            'message' => 'Sub Sub Kategori Berhasil Di Edit',
            'alert-type' => 'info'
        );

        // redirect halaman jika proses update berhasil
        return redirect()->route('subsubcategory.view')->with($notification);
    }

    // Method untuk proses hapus data
    public function SubSubCategoryDelete($id){
        // data diambil berdasarkan id menggunakan method findOrFail(). 
        // setelah data ditemukan, gunakan method delete() untuk menghapus data.
        SubSubCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Sub Sub Kategori Berhasil Di Hapus',
            'alert-type' => 'info'
        );

        // redirect halaman jika proses hapus berhasil
        return redirect()->back()->with($notification);
    } 
}