<?php

namespace App\Http\Controllers;

use App\Models\product;
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
}
