<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{




    public function create()
    {

        return view('posts.create');
    }




    public function store()
    {

        $attributes = $this->validatePost(new Post());

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnail', 'public');

        Post::create($attributes);

        session()->flash('success', 'Successfully posted!!!');

        return redirect('/');
    }



    public function show()
    {

        return view('posts.admin-post', [
            'posts' => Post::all()

        ]);
    }



    public function edit(Post $post)
    {
        return view('posts.post-edit', [
            'post' => $post

        ]);
    }



    public function update(Post $post)
    {

        $attributes = $this->validatePost($post);

        if(isset($attributes['thumbnail']))
        {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnail', 'public');
        }

        $post->update($attributes);

        session()->flash('success', 'Successfully updated!!!');
        return redirect('/admin/posts/'. $post->id .'/edit');
    }




    public function destroy(Post $post)
    {

        $post->delete();

        session()->flash('success', 'Post deleted!!!');
        return redirect('/admin/posts/dashboard');
    }




    public function validatePost(Post $post): array
    {


        return request()->validate([
            'title' => 'required',
            'thumbnail' => $post->exists ? ['image'] : ['required' , 'image'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

    }
}
