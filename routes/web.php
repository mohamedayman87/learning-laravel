<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $ideas = session()->get('ideas',[]);
    
    return view('home',[
        'ideas' => $ideas
    ]);
    
});
Route::post('/home', function () {
    $idea = request('idea');
    if($idea != ''){
        session()->push('ideas', $idea);
    }
    

    return redirect('/');
});

Route::get('/clear',function(){
session()->put('ideas' , []);
return view('home',[
    'ideas' => session('ideas')
]);
});