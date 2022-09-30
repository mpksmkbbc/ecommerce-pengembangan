<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use App\Models\Seo;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{
    public function SiteSetting(){
    	$setting = SiteSetting::find(1);
    	return view('backend.setting.site',compact('setting'));
    }

    public function SiteSettingUpdate(Request $request){
    	$setting_id = $request->id;

    	if ($request->file('logo')) {
    	 
            $image = $request->file('logo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(139,36)->save('upload/logo'.$name_gen);
            $save_url = 'upload/logo'.$name_gen;

            SiteSetting::findOrFail($setting_id)->update([
                'description' => $request->description,
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two,
                'email' => $request->email,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
                'logo' => $save_url,
    	    ]);

            $notification = array(
                'message' => 'Pengaturan Berhasil Diperbarui',
                'alert-type' => 'info'
            );

		    return redirect()->back()->with($notification);

    	}else{

            SiteSetting::findOrFail($setting_id)->update([
                'description' => $request->description,
                'phone_one' => $request->phone_one,
                'phone_two' => $request->phone_two,
                'email' => $request->email,
                'company_name' => $request->company_name,
                'company_address' => $request->company_address,
            ]);

            $notification = array(
                'message' => 'Pengaturan Berhasil Diperbarui',
                'alert-type' => 'info'
            );

		    return redirect()->back()->with($notification);

    	} 
    }

    public function SeoSetting(){
    	$seo = Seo::find(1);
    	return view('backend.setting.seo', compact('seo'));
    }

    public function SeoSettingUpdate(Request $request){
    	$seo_id = $request->id;

    	Seo::findOrFail($seo_id)->update([
            'meta_title' => $request->meta_title,
            'meta_author' => $request->meta_author,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'google_analytics' => $request->google_analytics,		 

    	]);

	    $notification = array(
			'message' => 'SEO Berhasil Diperbarui',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);
    }
}
