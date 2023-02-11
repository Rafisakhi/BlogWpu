<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ValidatedData = $request->validate([
            'title' => 'required|max:255|min:10',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);

        if($request->file('image')){
           $ValidatedData['image'] = $request->file('image')->store('posts-images');
        }

        $ValidatedData['user_id'] = auth()->user()->id;
        $ValidatedData['excerpt'] = Str::limit(strip_tags($request->body, 100));

        Post::create($ValidatedData);

        return redirect('/dashboard/posts')->with('success', 'New Post has Benn Updated!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if($post->author->id !== auth()->user()->id) {
            abort(403);
        }

        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if($post->author->id !== auth()->user()->id) {
            abort(403);
        }


        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:255|min:10',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ];

        if($request->slug != $post->slug){
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

         if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
           $validatedData['image'] = $request->file('image')->store('posts-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body, 100));

        Post::where('id', $post->id)
                ->update($validatedData);

        return redirect('/dashboard/posts')->with('success', ' Post has Benn Updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
            if($post->image){
                Storage::delete($post->image);
            }

        Post::destroy($post->id);

        return redirect('/dashboard/posts')->with('success', 'Post has Benn Deleted!');

    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        return response()->json([
            'slug' => $slug
        ]);
    }
}
