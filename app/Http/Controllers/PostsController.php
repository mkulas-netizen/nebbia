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


    public function update(Request $request,$id){
        $fields = $request->validate([
            'title'      => 'string',
            'content' => 'string',
        ]);

        $post = Post::find($id);
        $post->update($fields);

        return redirect()->back();
    }


    public function destroy($id){

        Post::find($id)->delete();

        return redirect()->back();
    }
}
