<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{


    public function index()
    {
        $posts = Post::has('category')->paginate(2);
        return view('posts.index')->with('posts', $posts);
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create')->with('categories', $categories);
    }

    public function store(PostStoreRequest $request)
    {
        $post = Post::create($request->all());
        return redirect(route('post.index'));
    }

    public function show($id)
    {
        $post = Post::find($id);
        if (empty($post)) {
            return redirect(route('post.index'));
        }
        return view('post.show')->with('post', $post);
    }
}

