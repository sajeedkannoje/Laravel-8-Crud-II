<?php

namespace App\Http\Controllers;

use App\Models\Post;
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

        $posts = Post::simplepaginate(5);

        return view("post.index", [
            "data" => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view("post.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'title' => 'required|max:100 ',
            'description' => 'required',
            'status' => 'required'
        ]);
        $post = new Post();

        $post->title = $request->title;
        $post->description = $request->description;
        $post->status = $request->status;
        $post->save();

        return redirect()->back()->with('message', 'Post Add successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        $data = Post::find($post);


        // return "$data";

        return view('post.edit', compact("data", "post"));
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

        // return $post;

        $request->validate([
            'title' => 'required|max:100 ',
            'description' => 'required',
            'status' => 'required'
        ]);
        $post = Post::find($post->id);

        $post->title = $request->title;
        $post->description = $request->description;
        $post->status = $request->status;
        $post->save();

        return redirect()->route('post.index')->with('message', 'Post Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index')->with('message', 'Post Delete successfully');
    }
}
