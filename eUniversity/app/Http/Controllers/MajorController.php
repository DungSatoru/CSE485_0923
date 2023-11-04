<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $majors = Major::orderBy('created_at', 'desc')->paginate(10);
        return view('majors.index', compact('majors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('majors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'duration' => 'required',
        ]);

        $major = new Major;
        $major->name = $validator['name'];
        $major->description = $validator['description'];
        $major->duration = $validator['duration'];


        $major->save();
        return redirect()->route('majors.index')->with('success', 'Major Created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Major $major)
    {
        return view('majors.show', compact('major'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Major $major)
    {
        return view('majors.edit', compact('major'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'duration' => 'required',
        ]);

        $major = Major::find($id);
        $major->name = $validator['name'];
        $major->description = $validator['description'];
        $major->duration = $validator['duration'];


        $major->save();
        return redirect()->route('majors.index')->with('success', 'Major updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Major $major)
    {
        $major->delete();
        return redirect()->route('majors.index')->with('success', 'Major delete successfully');
    }
}
