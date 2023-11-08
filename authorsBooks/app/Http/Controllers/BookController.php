<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::orderBy('created_at', 'DESC')->paginate(10);
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
    public function store(Request $request)
    {
        $validator = $request->validate([
            'image' => 'required',
            'name' => 'required',
            'published_date' => 'required',
            'categories' => 'required',
            'author_id' => 'required',
        ]);
        // book::create($request->all());
        $book = new book();
        $book->name = $validator['name'];
        $book->published_date = $validator['published_date'];
        $book->categories = $validator['categories'];
        $book->author_id = $validator['author_id'];
        
        // Kiểm tra nếu có tệp hình ảnh được tải lên
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); // Lưu hình ảnh vào thư mục 'images' trong storage/app/public
            $book->image = $imagePath;
        }
        $book->save();
        return redirect()->route('books.index')->with('success', 'book Created successfully.');
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
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validator = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'published_date' => 'required',
            'gender' => 'required'
        ]);
        // book::create($request->all());
        $book =  book::find($book->id);
        $book->name = $validator['name'];
        $book->email = $validator['email'];
        $book->published_date = $validator['published_date'];
        $book->gender = $validator['gender'];
        
        // Kiểm tra nếu có tệp hình ảnh được tải lên
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); // Lưu hình ảnh vào thư mục 'images' trong storage/app/public
            // Xóa hình ảnh cũ nếu có
            if (strpos($book->image, 'images') === 0) {
                Storage::disk('public')->delete($book->image);
            }
            $book->image = $imagePath;
        }
        
        $book->save();
        return redirect()->route('books.index')->with('success', 'book Created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'book delete successfully');
    }
}
