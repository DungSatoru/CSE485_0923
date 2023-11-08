<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::orderBy('created_at', 'DESC')->paginate(10);
        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'birthdate' => 'required',
            'gender' => 'required'
        ]);
        // Author::create($request->all());
        $author = new Author();
        $author->name = $validator['name'];
        $author->email = $validator['email'];
        $author->birthdate = $validator['birthdate'];
        $author->gender = $validator['gender'];
        $author->save();
        return redirect()->route('authors.index')->with('success', 'Author Created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return view('authors.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $validator = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'birthdate' => 'required',
            'gender' => 'required'
        ]);
        // Author::create($request->all());
        $author =  Author::find($author->id);
        $author->name = $validator['name'];
        $author->email = $validator['email'];
        $author->birthdate = $validator['birthdate'];
        $author->gender = $validator['gender'];
        $author->save();
        return redirect()->route('authors.index')->with('success', 'Author Created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index')->with('success', 'Author delete successfully');
    }
}
