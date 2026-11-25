<?php

use App\Models\Idea;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // $ideas = session()->get('ideas',[]);
    $ideas = Idea::query()
        ->when(request('state'), function ($query, $state) {
            $query->where('state', $state);
        })->get();
    // dd($ideas);
    return view('home', [
        'ideas' => $ideas
    ]);

});
Route::post('/home', function () {

    if (request('idea') != '') {
        Idea::create([
            'description' => request('idea'),
            'state' => 'pending'
        ]);
    }


    return redirect('/');
});

Route::get('/clear', function () {
    Idea::truncate();
    return view('home',$ideas=['ideas'=>Idea::all()]);
});