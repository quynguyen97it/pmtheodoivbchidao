<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('chat');
});

Auth::routes();

Route::get('/chat', function() {
    return view('chat');
})->middleware('auth');

Route::get('/getUserLogin', function() {
	return Auth::user();
})->middleware('auth');

Route::get('/messages', function() {
    return App\Models\Message::with('user')->get();
})->middleware('auth');

Route::post('/messages', function() {
   $user = Auth::user();

  $message = new App\Models\Message();
  $message->message = request()->get('message', '');
  $message->user_id = $user->id;
  $message->save();

  return ['message' => $message->load('user')];
})->middleware('auth');