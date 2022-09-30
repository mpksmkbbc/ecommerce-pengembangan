<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Method untuk menampilkan halaman kategori
    public function CategoryView()
    {
        // memanggil model category kemudian mengurutkan datanya dari yang terbaru dengan method latest()
        $categories = Category::latest()->get();
        // memanggil view dengan nama category.blade.php yang ada di folder resources\views\categories  
        // parsing data category ke dalam view menggunakan helper compact()
        return view('backend.categories.category', compact('categories'));
    }

    // Method untuk proses simpan data
    public function CategoryStore(Request $request)
    {
        // Validasi data
        $request->validate([
            'category_name' => 'required',
            'category_icon' => 'required',
        ], [
            'category_name.required' => 'Mohon diisi Nama Kategori',
            'category_icon.required' => 'Mohon diisi Ikon class fontawesome',
        ]);

        // proses insert data ke database
        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
            'category_icon' => $request->category_icon,
        ]);

        // toastr notification
        $notification = array(
            'message' => 'Kategori Berhasil Ditambahkan!',
            'alert-type' => 'success'
        );

        // redirect halaman
        return redirect()->back()->with($notification);
    }

    // Method untuk menampilkan halaman edit kategori
    public function CategoryEdit($id) {
        // mengambil data kategori berdasarkan id
        // parameter $id merupakan model Kategori yang diambil datanya sesuai dengan ID yang di dapatkan dari URL.
        $categories = Category::findOrFail($id);
        // memanggil view dengan nama category-edit.blade.php yang ada di folder resources\views\categories
        // parsing data categories ke dalam view menggunakan helper compact()
        return view('backend.categories.category-edit', compact('categories'));
    }

    // Method untuk proses update data kategori
    public function CategoryUpdate(Request $request) {
        // variabel $category_id berisi id yang direquest dengan name id 
        $category_id = $request->id;

        // mengambil data berdasarkan id dari $category_id 
        // kemudian melakukan proses update ke database dengan method update()
        Category::findOrFail($category_id)->update([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
            'category_icon' => $request->category_icon,
        ]);

        // toastr notification
        $notification = array(
            'message' => 'Kategori Berhasil Diperbarui!',
            'alert-type' => 'info'
        );

        // redirect halaman jika berhasil update
        return redirect()->route('category.view')->with($notification);
    }

    // Method untuk proses hapus data
    public function CategoryDelete($id) {
        // data diambil berdasarkan id menggunakan method findOrFail(). 
        // setelah data ditemukan, gunakan method delete() untuk menghapus data.
        Category::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Kategori Berhasil Dihapus!',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}