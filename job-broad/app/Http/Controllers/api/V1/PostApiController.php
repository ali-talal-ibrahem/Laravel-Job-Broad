<?php

namespace App\Http\Controllers\api\V1;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Post::paginate(5);
        if($data){
            return response($data, 200);
        }else{
            return response(['message' => 'Not Found'],404);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Post::create($request->all());
        if($data){
            return response(["data"=>$data , "message"=>"Post Created Successfuly !"],201);
        }else{
            return response(['message'=>'Error Creating'],500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Post::find($id);
        if($data){
            return response($data,200);
        }else{
            return response(['message'=>'Not Found'],404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Post::find($id);
        if($data){
            $data->update($request->all());
            return response(["data"=>$data , "message"=> "Post Update Successfuly !"],200);
        }else{
            return response(['message'=>'Not Found'],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Post::find($id);
        if($data){
            $data->delete();
            return response(["data"=>$data,'message'=>'Deleted Successfuly !'],204);
    }else{
            return response(['message'=>'Not Found'],404);
        }
    }
}
