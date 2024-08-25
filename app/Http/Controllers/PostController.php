<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Models\Post;
use App\Models\Website;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Website $website)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $post = new Post();
        $post->website_id = $website->id;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();

        // Fire the PostCreated event after a post is created
        event(new PostCreated($post));

        return response()->json(['message' => 'Post created successfully', 'post' => $post], 201);
    }
}
