<?php

use App\Models\Idea;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::view('/','welcome');


// index page
Route::get('/Ideas', function () {
    $ideas = Idea::all();
    return view('Ideas.index', [
        'ideas' => $ideas
    ]);

});

// clear all ideas 
Route::get('/Ideas/clear', function () {
    Idea::truncate();
    return redirect('/Ideas');
});

//show idea page
Route::get('/Ideas/{idea}',function(Idea $idea){
    return view('Ideas.show',[
        'idea' => $idea
    ]);
});

//edit an idea 
Route::get('/Ideas/{idea}/edit',function(Idea $idea){
    return view('Ideas.edit',[
        'idea' => $idea
    ]);
});

// update an idea
Route::patch('/Ideas/{idea}',function(Idea $idea){
    $idea->update([
        'description' => request('idea')
    ]);
    return redirect('/Ideas');
});

// delete a single idea
Route::delete('/Ideas/{idea}',function(Idea $idea){
    $idea->delete();
    return redirect('/Ideas');
});






// save and idea
Route::post('/Ideas', function () {

    if (request('idea') != '') {
        Idea::create([
            'description' => request('idea'),
            'state' => 'pending'
        ]);
    }


    return redirect('/Ideas');
});


