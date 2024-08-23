<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\visitor;
use Illuminate\Http\Request;

class apiController extends Controller
{
    function api_iphone(){
        $product = product::where('category_id', 1)->get();
        return response()->json(['data'=>$product]);
    }

    function api_mac(){
        $product = product::where('category_id', 2)->get();
        return response()->json(['data'=>$product]);
    }

    function api_ipad(){
        $product = product::where('category_id', 3)->get();
        return response()->json(['data'=>$product]);
    }

    function api_watch(){
        $product = product::where('category_id', 4)->get();
        return response()->json(['data'=>$product]);
    }

    function api_airpods(){
        $product = product::where('category_id', 5)->get();
        return response()->json(['data'=>$product]);
    }


    //  API người dùng truy cập trang


    function logVisit(Request $request){
    // Xác nhận yêu cầu AJAX
    if ($request->ajax()) {
        $city = $request->city;
        $ip = $request->ip();
        $find_ip = Visitor::where('ip_address', $ip)->first();

        if ($find_ip === null) {
            $visitor = new Visitor;
            $visitor->ip_address = $ip;
            $visitor->location = $city;
            $visitor->visited_at = now();
            $visitor->save();
        }

        // Trả về phản hồi JSON
        return response()->json(['status' => 'success']);
    }

    // Xử lý nếu không phải yêu cầu AJAX
    return redirect()->route('index');
    }

}   
