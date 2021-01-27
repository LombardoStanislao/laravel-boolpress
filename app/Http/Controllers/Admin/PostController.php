<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'posts' => Post::all()
        ];
        return view('admin.posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'categories' => Category::all()
        ];
        return view('admin.posts.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $newPost = new Post();
        $newPost->fill($data);
        // create slug
        $slug = Str::slug($newPost->post_title);
        // save original slug without changes
        $base_slug = $slug;
        // check if it already exists in the db
        $found_existing_slug = Post::where('slug', $slug)->first();
        $counter = 1;
        // create while loop if $found_existing_slug = true

        while ($found_existing_slug) {
            $slug = $base_slug . '-' . $counter;
            $counter++;
            $found_existing_slug = Post::where('slug', $slug)->first();
        }

        // If it leave this loop i'm sure that there aren't $slug with the same name
        $newPost->slug = $slug;
        $newPost->save();
        return redirect()->route('admin.posts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        if ($post) {
            $data = [
                'post' => $post
            ];
            return view('admin.posts.show', $data);
        }
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->first();
        if ($post) {
            $data = [
                'post' => $post,
                'categories' => Category::all()
            ];
            return view('admin.posts.edit', $data);
        }
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $post = Post::where('slug', $slug)->first();
        $data = $request->all();
        if ($data['post_title'] != $post->post_title) {
            // create slug
            $slug = Str::slug($post->post_title);
            // save original slug without changes
            $base_slug = $slug;
            // check if it already exists in the db
            $found_existing_slug = Post::where('slug', $slug)->first();
            $counter = 1;
            // create while loop if $found_existing_slug = true

            while ($found_existing_slug) {
                $slug = $base_slug . '-' . $counter;
                $counter++;
                $found_existing_slug = Post::where('slug', $slug)->first();
            }

            // If it leave this loop i'm sure that there aren't $slug with the same name
            $data['slug'] = $slug;
        }

        $post->update($data);
        return redirect()->route('admin.posts.show', $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
