<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\BookStoreRequest;
use App\Http\Requests\Book\BookUpdateRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::orderBy('BookID', 'desc')->paginate(5);
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Book::getGenres();
        return view('books.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookStoreRequest $request)
    {
        $book = new Book();
        $validator = $request->validate([
            'Title' => 'required',
            'Author' => 'required',
            'Genre' => 'required',
            'PublicationYear' => 'required',
            'ISBN' => 'required',
            'CoverImageUrl' => 'required',
        ]);
        $book->Title = $validator['Title'];
        $book->Author = $validator['Author'];
        $book->Genre = $validator['Genre'];
        $book->PublicationYear = $validator['PublicationYear'];
        $book->ISBN = $validator['ISBN'];
        $book->CoverImageUrl = $validator['CoverImageUrl'];
        // Kiểm tra nếu có tệp hình ảnh được tải lên
        if ($request->hasFile('CoverImageUrl')) {
            $imagePath = $request->file('CoverImageUrl')->store('images', 'public'); // Lưu hình ảnh vào thư mục 'images' trong storage/app/public
            $book->CoverImageUrl = $imagePath;
        }
        $book->save();
        return redirect()->route('books.index')->with('success', 'Book Created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::where('bookID', '=', $id)->first();
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::where('bookID', '=', $id)->first();
        $genres = Book::getGenres();
        return view('books.edit', compact('book', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookUpdateRequest $request, string $id)
    {
        $validator = $request->validated();

        $book = Book::Find($id);

        $validator = $request->validate([
            'Title' => 'required',
            'Author' => 'required',
            'Genre' => 'required',
            'PublicationYear' => 'required',
            'ISBN' => 'required',
            'CoverImageUrl' => 'required',
        ]);
        $book->Title = $validator['Title'];
        $book->Author = $validator['Author'];
        $book->Genre = $validator['Genre'];
        $book->PublicationYear = $validator['PublicationYear'];
        $book->ISBN = $validator['ISBN'];
        $book->CoverImageUrl = $validator['CoverImageUrl'];
        // Kiểm tra nếu có tệp hình ảnh được tải lên
        if ($request->hasFile('CoverImageUrl')) {
            $imagePath = $request->file('CoverImageUrl')->store('images', 'public'); // Lưu hình ảnh vào thư mục 'images' trong storage/app/public
            // Xóa hình ảnh cũ nếu có
            if (strpos($book->CoverImageUrl, 'images') === 0) {
                Storage::disk('public')->delete($book->CoverImageUrl);
            }
            $book->CoverImageUrl = $imagePath;
        }
        $book->save();
        return redirect()->route('books.index')->with('success', 'book Created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Book::where('bookID', '=', $id)->delete();

        // $book->update(); $book->save();
        /* Nó sẽ có câu truy vấn mặc định là where ID = '...' */

        return redirect()->route('books.index')->with([
            'message' => 'Book destroyed successfully',
            'type' => 'danger',
        ]);
    }
}
