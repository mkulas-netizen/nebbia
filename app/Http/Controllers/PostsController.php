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
       $rss =  Post::where('id',$request->id)->first();
       return view('rssDetail',['rss' => $rss]);
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

        Post::where('id',$id)->update($fields);
        return redirect()->back();
    }


    public function destroy($id){

        Post::find($id)->delete();

        return redirect()->back();
    }
}
