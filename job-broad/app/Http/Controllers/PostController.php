<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    //  Display a listing of the resource.

    public function index()
    {
        $data = Post::latest()->simplePaginate(5);
        return view("post.index", ["posts" => $data, "pageTitle" => "Post"]);
    }


    //  Show the form for creating a new resource.

    public function create()
    {
        return view("post.create", ["pageTitle" => "Create Post"]);
    }


    //  Store a newly created resource in storage.

    public function store(PostRequest $request)
    {
        $post = new Post();
        $post->title = $request->input("title");
        $post->author = $request->input("author");
        $post->body = $request->input("body");
        $post->published = $request->has("published");

        $post->save();

        return redirect("/post")->with("success","Post Creating Successfully !");
    }


    // Display the specified resource.

    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view("post.show", data: ["post" => $post, "pageTitle" => "Show Post"]);
    }


    //  Show the form for editing the specified resource.

    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view("post.edit", ['post'=>$post ,"pageTitle" => "Edit Post"]);
    }


    //  Update the specified resource in storage.

    public function update(PostRequest $request, string $id)
    {
        $post = Post::findOrFail($id);
        $post->title = $request->input("title");
        $post->author = $request->input("author");
        $post->body = $request->input("body");
        $post->published = $request->has("published");

        $post->save();

        return redirect("/post")->with("update","Post Update Successfully !");
    }


    //  Remove the specified resource from storage.

    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        
        return redirect("/post")->with("delete","Post Delete Successfully !");    
    }
}
