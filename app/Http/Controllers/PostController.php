<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class PostController extends Controller
{




    public function index()
    {

        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(3)->withQueryString()
        ]);
    }




    public function show(Post $post)
    {

        return view('posts.show', [
            'post' => $post

        ]);
    }



}


//  7 methods rule ====  index, show, create, store, edit, update, destroy
