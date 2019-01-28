<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if($request->hasFile('thumbnail')){
            $post = new Post();
            $post->title = $request->get('title');
            $post->content = $request->get('content');
            
            $image = $request->file('thumbnail');
            $imageName = date("Y-m-d",time()).'-'.str_random(10).'.'.$image->getClientOriginalExtension();
            $destinationPath = 'images/blog/';
            $image->move($destinationPath, $imageName);
            $post->thumbnail = $destinationPath.''.$imageName;
            $post->save();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        if($post = Post::findOrFail($id))
            return view('singlePost',compact('post'));
    }

}
