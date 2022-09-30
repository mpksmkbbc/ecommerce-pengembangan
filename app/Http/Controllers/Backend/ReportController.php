<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;

use Illuminate\Http\Request;
use DateTime;

class ReportController extends Controller
{
    public function ReportView(){

        return view('backend.reports.report-view');
    }

    public function ReportByDate(Request $request){
        // return $request->all();
        $date = new DateTime($request->date);
        $formatDate = $date->format('d F Y');
        // return $formatDate;
        $orders = Order::where('order_date',$formatDate)->latest()->get();
        return view('backend.reports.report-show',compact('orders'));
    }

    public function ReportByMonth(Request $request){
        $orders = Order::where('order_month',$request->month)->where('order_year',$request->year_name)->latest()->get();
        return view('backend.reports.report-show',compact('orders'));
    } 

    public function ReportByYear(Request $request){
        $orders = Order::where('order_year',$request->year)->latest()->get();
        return view('backend.reports.report-show',compact('orders'));
    } 
}
