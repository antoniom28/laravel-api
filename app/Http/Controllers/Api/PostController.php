<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index($id = null){
        if($id)
            $posts = Post::whereId($id)->get();
        else
            $posts = Post::all();

        foreach($posts as $post){
            $post['user'] = $post->user;
            $post['tags'] = $post->tags;
        }
        //$posts = Post::where('category_id' , $id)->get();
        //$posts = Post::where('category_id' , '!=' , null)->get();
        return response()->json($posts);
    }
}
