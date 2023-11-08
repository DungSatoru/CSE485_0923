<?php

namespace App\Http\Controllers;

use App\Models\Flower;
use Illuminate\Http\Request;

class FlowerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flowers = Flower::orderBy('created_at', 'DESC')->paginate(10);
        return view('flowers.index', compact('flowers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('flowers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required',
            'image_url' => 'required',
            'description' => 'required',
        ]);
        // Flower::create($request->all());
        $flower = new Flower();
        $flower->name = $validator['name'];
        // Kiểm tra nếu có tệp hình ảnh được tải lên
        if ($request->hasFile('image_url')) {
            $imagePath = $request->file('image_url')->store('images', 'public'); // Lưu hình ảnh vào thư mục 'images' trong storage/app/public
            $flower->image_url = $imagePath;
        }
        $flower->description = $validator['description'];
        $flower->save();
        return redirect()->route('flowers.index')->with('success', 'Flower Created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Flower $flower)
    {
        return view('flowers.show', compact('flower'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Flower $flower)
    {
        return view('flowers.edit', compact('flower'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Flower $flower)
    {
        $validator = $request->validate([
            'name' => 'required',
            'image_url' => 'required',
            'description' => 'required',
        ]);
        // Flower::create($request->all());
        $flower =  Flower::find($flower->id);
        $flower->name = $validator['name'];
        // Kiểm tra nếu có tệp hình ảnh được tải lên
        if ($request->hasFile('image_url')) {
            $imagePath = $request->file('image_url')->store('images', 'public'); // Lưu hình ảnh vào thư mục 'images' trong storage/app/public
            $flower->image_url = $imagePath;
        }
        $flower->description = $validator['description'];

        $flower->save();
        return redirect()->route('flowers.index')->with('success', 'Flower Created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Flower $flower)
    {
        $flower->delete();
        return redirect()->route('flowers.index')->with('success', 'Flower delete successfully');
    }
}
