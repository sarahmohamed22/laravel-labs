<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Http\Resources\PostResource;
use App\Http\Requests\Post\StorePostRequest;

class PostController extends Controller
{
     
    public function index()
    {
        $posts = Post::all();
        // return $posts;
        return PostResource::collection($posts);
    }

    public function show($post)
    {
        $post=Post::findORFail($post);
        return new  PostResource($post);
    }

    public function store(StorePostRequest $post)
    {
        Post::create(request()->all());
        return response()->json(['meassage'=>'post createdsuccessfuly'],201);
    }

}
