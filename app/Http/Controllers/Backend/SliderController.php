<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    // Method untuk menampilkan halaman kelola slider
	public function SliderView(){
		$sliders = Slider::latest()->get();
		return view('backend.sliders.slider',compact('sliders'));
	}

    // Method untuk proses simpan data slider
    public function SliderStore(Request $request){
        // validasi data
    	$request->validate([
    		'slider_img' => 'required',
    	],[
    		'slider_img.required' => 'Mohon Pilih Satu Gambar',
    	]);

        // proses penyimpanan gambar
    	$image = $request->file('slider_img');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(870,370)->save('upload/sliders/'.$name_gen);
    	$save_url = 'upload/sliders/'.$name_gen;

        // method insert() menerima array dari atribut dan melakukan proses insert data ke database
	    Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'slider_img' => $save_url,
    	]);

        // toastr notification
	    $notification = array(
			'message' => 'Slider Berhasil Ditambah',
			'alert-type' => 'success'
		);

        // redirect halaman jika proses menambahkan data berhasil
		return redirect()->back()->with($notification);
    } 

    // Method untuk menonaktifkan slider
    public function SliderInactive($id){
    	Slider::findOrFail($id)->update(['status' => 0]);

    	$notification = array(
			'message' => 'Slider Non Aktif',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);
    } 

    // Method untuk mengaktifkan slider
    public function SliderActive($id){
    	Slider::findOrFail($id)->update(['status' => 1]);

    	$notification = array(
			'message' => 'Slider Aktif',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);
    } 

    // Method untuk menampilkan halaman edit slider
    public function SliderEdit($id){
        // mengambil data slider berdasarkan id
        // parameter $id merupakan model Slider yang diambil datanya sesuai dengan ID yang di dapatkan dari URL.
        $sliders = Slider::findOrFail($id);
        // setelah data tersebut di dapatkan, maka akan di passing ke dalam view slider-edit.blade.php di dalam folder sliders dengan menggunakan helper compact.
        return view('backend.sliders.slider-edit', compact('sliders'));
    }

    // Method untuk proses update data slider
    public function SliderUpdate(Request $request){
    	// mengambil data slider yang direquest dengan name id dan name old_image
    	$slider_id = $request->id;
    	$old_img = $request->old_image;

        // jika ada request file dengan name slider_img
    	if ($request->file('slider_img')) {
            // jalankan perintah berikut
            unlink($old_img);
            $image = $request->file('slider_img');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(870,370)->save('upload/sliders/'.$name_gen);
            $save_url = 'upload/sliders/'.$name_gen;

            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'slider_img' => $save_url,
            ]);

            $notification = array(
                'message' => 'Slider Berhasil Diperbarui',
                'alert-type' => 'info'
            );

            return redirect()->route('manage.slider')->with($notification);

    	} else {
            // jika tidak ada request file dengan name slider_img, lakukan update tanpa meng-update kolom slider_img.
            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);

            $notification = array(
                'message' => 'Slider Berhasil Diperbarui Tanpa Gambar',
                'alert-type' => 'info'
            );

            return redirect()->route('manage.slider')->with($notification);
    	} 
    } 

    // Method untuk proses hapus data slider
    public function SliderDelete($id){
    	$slider = Slider::findOrFail($id);
    	$img = $slider->slider_img;
    	unlink($img);
    	Slider::findOrFail($id)->delete();

    	$notification = array(
			'message' => 'Slider Berhasil Dihapus',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);
    } 
}