<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index(){
        $data = Post::simplePaginate(5);
        return view("post.index" , ["posts" => $data,"pageTitle"=> "Post"]);
    }
    function show($id){
        $post = Post::findOrFail($id);
            return view("post.show", data: ["post"=> $post, "pageTitle"=> "Show Post"]);
    }

    function create(){

       Post::factory(20)->create();

        return redirect("/blog");
       }

    public function delete(){
        Post::destroy(4);
    
        return redirect("/blog");
    }

}
    
