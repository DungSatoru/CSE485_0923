<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage; // Add this line

class ArtworkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artworks = Artwork::orderBy('created_at', 'desc')->paginate(10);
        return view('artworks.index', compact('artworks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('artworks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'artist_name' => 'required',
            'description' => 'required',
            'art_type' => 'required',
            'media_link' => 'required',
        ]);

        $artwork = new Artwork;
        $artwork->artist_name = $validator['artist_name'];
        $artwork->description = $validator['description'];
        $artwork->art_type = $validator['art_type'];
        $artwork->media_link = $validator['media_link'];

        // Kiểm tra nếu có tệp hình ảnh được tải lên
        if ($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('images', 'public'); // Lưu hình ảnh vào thư mục 'images' trong storage/app/public
            $artwork->cover_image = $imagePath;
        }

        $artwork->save();
        return redirect()->route('artworks.index')->with('success', 'Artwork Created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Artwork $artwork)
    {
        return view('artworks.show', compact('artwork'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artwork $artwork)
    {
        return view('artworks.edit', compact('artwork'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = $request->validate([
            'artist_name' => 'required',
            'description' => 'required',
            'art_type' => 'required',
            'media_link' => 'required',
        ]);

        $artwork = Artwork::find($id);
        $artwork->artist_name = $validator['artist_name'];
        $artwork->description = $validator['description'];
        $artwork->art_type = $validator['art_type'];
        $artwork->media_link = $validator['media_link'];

        // Kiểm tra nếu có tệp hình ảnh được tải lên
        if ($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('images', 'public'); // Lưu hình ảnh vào thư mục 'images' trong storage/app/public
            // Xóa hình ảnh cũ nếu có
            if (strpos($artwork->cover_image, 'images') === 0) {
                Storage::disk('public')->delete($artwork->cover_image);
            }
            $artwork->cover_image = $imagePath;
        }

        $artwork->save();
        return redirect()->route('artworks.index')->with('success', 'Artwork updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artwork $artwork)
    {
        $artwork->delete();
        return redirect()->route('artworks.index')->with('success', 'Author delete successfully');
    }
}
