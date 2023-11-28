<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StoreRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $posts = PostResource::collection($posts)->resolve();
        return inertia('Post/Index', compact('posts'));
    }
    public function create()
    {
        return inertia('Post/Create');
    }
   public function store(StoreRequest $request)
    {
        $data = $request->validated();

        Post::create($data);
        return redirect()->route('post.index');
    }

    public function getPosts()
    {
        return Post::all();
    }
}
