<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\StoreRequest;
use App\Http\Requests\Book\UpdateRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::orderBy('id', 'DESC')->paginate(10);
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::all();
        $books = new Book();
        $categories = $books->getEnumTypes();
        return view('books.create', compact('authors', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $book = new Book();
        $validator = $request->validated();
        if ($request->hasFile('image')) {
            /* Thầy dùng Storage của Laravel. */
            $file = $request->file('image');
            $name =  date('d-m-Y') . '_' . uniqid() . $file->getClientOriginalExtension();
            /* Thứ_ngày_Tháng_random.[đuôi file mặc định] */
            $file->move('uploads/images', $name);

            $validator['image'] = $name;
        }
        $book->fill($validator);
        $book->save();

        return redirect()->route('books.index')->with([
            'type' => 'success',
            'message' => 'Books created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        $categories = $book->getEnumTypes();
        return view('books.edit', compact('book', 'authors', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $book = Book::find($id);
        $validator = $request->validated();
        if ($request->hasFile('image')) {
            /* Thầy dùng Storage của Laravel. */
            $file = $request->file('image');
            $name =  date('d-m-Y') . '_' . uniqid() . $file->getClientOriginalExtension();
            /* Thứ_ngày_Tháng_random.[đuôi file mặc định] */
            $file->move('uploads/images', $name);

            $validator['image'] = $name;
        }
        $book->fill($validator);
        $book->save();

        if ($book->wasChanged()) {
            return redirect()->route('books.index')->with([
                'message' => 'Book updated successfully',
                'type' => 'success',
            ]);
        } else {
            return redirect()->route('books.index')->with([
                'message' => 'No changes were saved',
                'type' => 'info',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with([
            'type' => 'danger',
            'message' => 'Book destroyed successfully'
        ]);
    }
}
