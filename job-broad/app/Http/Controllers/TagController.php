<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;

class TagController extends Controller
{
    function index(){ 
        $data = Tag::all();
        return view("tag.index" , ["tags" => $data,"pageTitle"=> "Tags"]);
    }
    function create(){
        Tag::create(
        [
            "title" => "Teashers",
        ]);

        return redirect("/tag");

    }

    function testManyToMany(){
        $tag = Tag::find(2);

        // $tag->posts()->attach([2]);

        return response()->json([
            "tag" => $tag->title,
            "post" => $tag->posts
        ]);
    }
}
    
