<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Admin;
use App\Models\User;

class ProfileController extends Controller
{
    // Method untuk menampilkan halaman admin profil
    public function AdminProfile(){
        // $adminData = Admin::find(1); // hanya menampilkan data admin yang login
        $id = Auth::user()->id;
		$adminData = Admin::find($id);
        return view('backend.profile.profile-view', compact('adminData'));
    }

    // Method untuk mengubah profil admin
    public function AdminProfileStore(Request $request) {
        // $data = Admin::find(1);
        $id = Auth::user()->id;
		$data = Admin::find($id);
        $data->name = $request->name;
        $data->email = $request->email;

        if($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/admin-images/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin-images'), $filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Admin Profile Berhasil Diupdate',
            'alert-type' => 'success'
        );

        // redirect halaman jika profile berhasil diubah
        return redirect()->route('admin.profile')->with($notification);
    }

    // Method untuk menampilkan halaman ubah password
    public function AdminChangePassword(){
        return view('backend.profile.admin-change-password');
    }

    // Method untuk mengubah password admin
    public function AdminUpdateChangePassword(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)){
            $admin = Admin::find(Auth::id());
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();

            return redirect()->route('admin.logout');
        }else{
            return redirect()->back();
        }
    }

    public function AllUsers(){
		$users = User::latest()->get();
		return view('backend.all-user', compact('users'));
	}
}
