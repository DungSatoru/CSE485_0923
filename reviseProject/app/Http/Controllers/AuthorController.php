<?php

namespace App\Http\Controllers;

use App\Http\Requests\Authors\StoreRequest;
use App\Http\Requests\Authors\UpdateRequest;
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
    public function store(StoreRequest $request)
    {
        $author = new Author();
        $author->fill($request->validated());
        $author->save();

        return redirect()->route('authors.index')->with([
            'type' => 'success',
            'message' => 'Authors created successfully'
        ]);
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
    public function update(UpdateRequest $request, string $id)
    {
        $author = Author::find($id);
        $author->fill($request->validated());
        $author->save();

        if ($author->wasChanged()) {
            return redirect()->route('authors.index')->with([
                'message' => 'Author updated successfully',
                'type' => 'success',
            ]);
        } else {
            return redirect()->route('authors.index')->with([
                'message' => 'No changes were saved',
                'type' => 'info',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index')->with([
            'type' => 'danger',
            'message' => 'Authors destroyed successfully'
        ]);
    }
}
