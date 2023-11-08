<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Flower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regions = Region::orderBy('created_at', 'DESC')->paginate(10);
        return view('regions.index', compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $flowers = Flower::all();
        return view('regions.create', compact('flowers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'region_name' => 'required',
            'flower_id' => 'required',
        ]);
        // region::create($request->all());
        $region = new region();
        $region->region_name = $validator['region_name'];
        $region->flower_id = $validator['flower_id'];
        $region->save();
        return redirect()->route('regions.index')->with('success', 'region Created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Region $region)
    {
        return view('regions.show', compact('region'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Region $region)
    {
        $flowers = Flower::all();
        return view('regions.edit', compact('region', 'flowers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Region $region)
    {
        $validator = $request->validate([
            'region_name' => 'required',
            'flower_id' => 'required',
        ]);
        $region =  region::find($region->id);
        $region->region_name = $validator['region_name'];
        $region->flower_id = $validator['flower_id'];

        $region->save();
        return redirect()->route('regions.index')->with('success', 'region Created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Region $region)
    {
        $region->delete();
        return redirect()->route('regions.index')->with('success', 'region delete successfully');
    }
}
