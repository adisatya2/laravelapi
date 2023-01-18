<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostDetailResource;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        //return response()->json(['data' => $posts]);
        return PostResource::collection($posts);
    }

    public function show($id)
    {
        //$post = Post::with('writer')->findOrFail($id);
        //return response()->json(['data' => $post]);
        //return new PostDetailResource($post);

        return new PostDetailResource(Post::with('writer:id,username,firstname,lastname')->findOrFail($id));
    }

    public function show2($id)
    {
        return new PostDetailResource(Post::findOrFail($id));
    }
}
