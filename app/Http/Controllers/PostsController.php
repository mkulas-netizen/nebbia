<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show(Post $post): Post
    {
        return $post;
    }


    public function edit(Request $request){
       $rss =  Post::find($request->id)->first();

       return view('rssDelete',['rss' => $rss]);
    }


    public function store(Request $request){
        $fields = $request->validate([
            'title'      => 'required|string',
            'content' => 'required|string',
        ]);

        Post::create($fields);

        return redirect()->back();
    }
}
