<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    public function getIndex(){
        $posts = Post::paginate(5);

        return view('blog.index')->withPosts($posts);
}
    public function getSingle($id){
        // fetch from db
        $post =Post::find($id);
        // return the view and pass it
        // dd($post);
        return view('blog.single')->withPost($post);
    }
}
