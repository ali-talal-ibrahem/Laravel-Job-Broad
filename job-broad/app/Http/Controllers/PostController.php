<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index(){
        $data = Post::all();
        return view("post.index" , ["posts" => $data,"pageTitle"=> "Post"]);
    }
    function show($id){
        $post = Post::findOrFail($id);
            return view("post.show", ["post"=> $post, "pageTitle"=> "Show Post"]);
    }

    function create(){
       $post = Post::create(
        [
            "title" => "Football Player",
            "bode" => "the post New",
            "author" => "Maher Ibrahem",
            "published" => true,
        ]);

        return redirect("/blog");

    }


}
    
