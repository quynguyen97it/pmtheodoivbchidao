<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Redis;
use App\Http\Requests;
use App\Http\Controllers\Controller;
 
class ChatController extends Controller
{

    public function getRedis(Request $request)
    {
        Redis::connection();
        Redis::set('name', 'Xin chào');
        $user = Redis::get('name');
        return view('test')->with('hello',$user);
    }
}