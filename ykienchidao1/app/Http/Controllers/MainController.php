<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MainController extends Controller
{
    public function index()
    {
        $products = DB::table('PL1YKCD')->get();
        //return $products[1]->TrichYeuVanBan;
        return view('welcome')->with('products',$products);
    }
}
