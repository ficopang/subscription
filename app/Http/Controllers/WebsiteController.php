<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $websites = Website::all();

        return response()->json($websites, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $website = new Website();
        $website->name = $request->name;
        $website->save();

        return response()->json($website, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Website $website)
    {
        return response()->json($website, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Website $website)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $website->name = $request->name;
        $website->save();

        return response()->json($website, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Website $website)
    {
        $website->delete();

        return response()->json(['message' => 'Website deleted successfully'], 200);
    }
}