<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags=tag::all();
        return view('tags.alltgs',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users=User::all();
        $posts=Post::all();
        return view('tags.createtag' ,compact('users','posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'user'=>'required|array',
            'post'=>'required|string'
        ]);
        $user=implode(",",$data['user']);

        $tag=new tag();
        $tag->name=$user;
        $tag->save();
        $tag->posts()->attach([$data['post']]);
        return redirect()->route('tag.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        $users=User::all();
        $posts=Post::all();

        return view('tags.updateetag',compact('tag','users','posts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $data=$request->validate([
            'user'=>'required|array',
            'post'=>'required|string'
        ]);
        $user=implode(",",$data['user']);

        $tag=tag::find($tag->id);
        $tag->name=$user;
        $tag->save();
        $tag->posts()->attach([$data['post']]);
        return redirect()->route('tag.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tag.index');
    }
}
