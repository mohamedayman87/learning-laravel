<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ideas = Idea::all();
        return view('Ideas.index', [
            'ideas' => $ideas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Ideas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (request('idea') != '') {
            Idea::create([
                'description' => request('idea'),
                'state' => 'pending'
            ]);
        }


        return redirect('/Ideas');
    }

    /**
     * Display the specified resource.
     */
    public function show(Idea $idea)
    {
        return view('Ideas.show', [
            'idea' => $idea
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idea $idea)
    {
        return view('Ideas.edit', [
            'idea' => $idea
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Idea $idea)
    {
        $idea->update([
            'description' => request('idea')
        ]);
        return redirect('/Ideas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idea $idea)
    {

        $idea->delete();
        return redirect('/Ideas');
    }

    public function clear()
    {
        Idea::truncate();
        return redirect('/Ideas');
    }

}
