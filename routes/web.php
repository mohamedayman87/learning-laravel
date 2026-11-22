<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'message' => "hello , ",
        'person' => request('name', 'world !')
    ]);
});
Route::view('/test', 'test');
Route::view("/contact", "contact");