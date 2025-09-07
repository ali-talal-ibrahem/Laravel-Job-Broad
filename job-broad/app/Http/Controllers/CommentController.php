<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    function index() {
        $data = Comment::all();
        return view("comment.index", ["comments"=> $data , "pageTitle" => 'Comments']);
    }


    public function create(){

        Comment::factory(5)->create();

        return redirect("/comments");
    }

}
    
