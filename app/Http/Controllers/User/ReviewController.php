<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Review;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; 

class ReviewController extends Controller
{
    public function ReviewStore(Request $request){
    	$product = $request->product_id;

    	$request->validate(['comment' => 'required']);

    	Review::insert([
    		'product_id' => $product,
    		'user_id' => Auth::id(),
    		'comment' => $request->comment,
            'rating' => $request->quality,
    		'created_at' => Carbon::now(),
    	]);

    	$notification = array(
			'message' => 'Ulasan Akan Dikonfirmasi Oleh Admin',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    }

		public function ReviewRequest(){
    	$review = Review::where('status',0)->orderBy('id','DESC')->get();
    	return view('backend.review.review-request',compact('review'));
    } 

		public function ReviewApprove($id){
    	Review::where('id',$id)->update(['status' => 1]);

    	$notification = array(
            'message' => 'Ulasan Berhasil Dikonfirmasi',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

		public function PublishReview(){
			$review = Review::where('status',1)->orderBy('id','DESC')->get();
			return view('backend.review.review-all-request',compact('review'));
		}

		public function DeleteReview($id){
    	Review::findOrFail($id)->delete();

    	$notification = array(
            'message' => 'Ulasan Berhasil Di Hapus',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

}