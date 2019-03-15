<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Post;
use App\User;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::all()
        ]);
    }

    public function create()
    {
        $users = User::all();
        return view('posts.create',[
            'users' => $users,
        ]);
    }
    public function store(StorePostRequest $request)
    {
        Post::create(request()->all());
        return redirect()->route('posts.index');
    }
    public function edit(Post $post)
    {
        // $post = Post::find($post);
        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    public function update(Request $request,Post $post)
    {
    
        $posts=Post::find('id');
        $posts->title=$request->get('title');
        $posts->description=$request->get('description');
        $posts->save();
        return redirect()->route('posts.index');
    }
    public function show(Post $post)
    {   
        return view('posts.show', ['post' => $post,'user'=>User ::findOrFail($post->id)]);
        
    }

    public function delete($post)
    {   
        $res=Post::where('id',$post)->delete();
        return redirect()->route('posts.index',['posts'=>post::all()]);
        
    }

}
