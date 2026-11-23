<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'tasks' =>[
            'laravel course',
            'play some games',
            'go to gym'
        ]
    ]);
});
Route::view('/test', 'test');
Route::view("/contact", "contact");