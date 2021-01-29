<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $data = [
            'categories' => $categories
        ];
        return view('admin.categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_updated = $request->all();
        $newCategory = new Category();
        $newCategory->fill($form_updated);
        // create slug
        $slug = Str::slug($newCategory->name);
        // save original slug without changes
        $base_slug = $slug;
        // check if it already exists in the db
        $found_existing_slug = Category::where('slug', $slug)->first();
        $counter = 1;
        // create while loop if $found_existing_slug = true

        while ($found_existing_slug) {
            $slug = $base_slug . '-' . $counter;
            $counter++;
            $found_existing_slug = Category::where('slug', $slug)->first();
        }

        // If it leave this loop i'm sure that there aren't $slug with the same name
        $newCategory->slug = $slug;

        $newCategory->save();
        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $data = [
            'category' => $category
        ];
        return view('admin.categories.show',  $data);
        // Opzione lunga e scomoda

        // $category = Category::find($id);
        // $tutti_i_post_della_categoria = Post::where('category_id', $category->id)->get();
        // $data = [
        //     'tutti_i_post' => $tutti_i_post_della_categoria
        // ];
        // return view('admin.categories.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $form_updated = $request->all();
        if ($form_updated['name'] != $category->name) {
            // create slug
            $slug = Str::slug($category->name);
            // save original slug without changes
            $base_slug = $slug;
            // check if it already exists in the db
            $found_existing_slug = Category::where('slug', $slug)->first();
            $counter = 1;
            // create while loop if $found_existing_slug = true

            while ($found_existing_slug) {
                $slug = $base_slug . '-' . $counter;
                $counter++;
                $found_existing_slug = Category::where('slug', $slug)->first();
            }

            // If it leave this loop i'm sure that there aren't $slug with the same name
            $form_updated['slug'] = $slug;
        }
        $category->update($form_updated);
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index');
    }
}
