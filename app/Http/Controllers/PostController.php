<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=auth()->user();
        if($user['is_bocked']===1){

            $user->tokens()->delete();
            return response()->json([
                "massage"=>"bocked you"
            ],200);
        }
        $categore=category::all();
        $post=post::with('category','user')->get();
        return response()->json( [$post,$categore]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 'user_id',
        // 'category_id',
        // 'titel',
        // 'description',
        // 'imge'

        $user=auth()->user();
        if($user['is_bocked']===1){

            $user->tokens()->delete();
            return response()->json([
                "massage"=>"bocked you"
            ],200);
        }

        $val=$request->validate([
            'titel'=>'required|string|max:59',
            'description'=>'required|string',
            'imge'=>'required|image'
        ]);
        $post = new Post;
        if ($request->hasFile("imge")) {
            $imge = $request->imge;
            $imgname = time() . '.' . $imge->getClientOriginalExtension();;
            $imge->move(public_path('imges'), $imgname);
        }

        $post->user_id=$user['id'];
        $post->category_id=$request->category;
        $post->titel = $val['titel'];
        $post->description = $val['description'];
        $post->img = $imgname;
        $post->save();


        return response()->json([
            "massage"=>"post add"
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $user=auth()->user();
        if($user['is_bocked']===1){

            $user->tokens()->delete();
            return response()->json([
                "massage"=>"bocked you"
            ],200);
        }

        return response()->json($post);
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $user=auth()->user();
        if($user['id']===$post['user_id']){
        if($user['is_bocked']===1){

            $user->tokens()->delete();
            return response()->json([
                "massage"=>"bocked you"
            ],200);
        }

        $val=$request->validate([
            'titel'=>'required|string|max:59',
            'description'=>'required|string',
            'imge'=>'image|nullable'
        ]);

        $post =  Post::findorfail($post['id']);
        if ($request->hasFile("imge")) {
            $imge = $request->imge;
            $imgname = time() . '.' . $imge->getClientOriginalExtension();;
            $imge->move(public_path('imges'), $imgname);
            $post->img = $imgname;
        }
        $post->user_id=$user['id'];
        $post->category_id=$request->category;
        $post->titel = $val['titel'];
        $post->description = $val['description'];
        $post->save();


        return response()->json([
            "massage"=>"post update"
        ],201);
    }else{
            return response()->json([
                "massage"=>"it is not yuor post"
            ],301);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $user=auth()->user();
        if($user['id']===$post['user_id']){
        if($user['is_bocked']===1){
            $user->tokens()->delete();
            return response()->json([
                "massage"=>"bocked you"
            ],200);
        }

        $post->delete();
        return response()->json([
            "massage"=>"post dilete"
        ],201);
    }
    else{
        return response()->json([
            "massage"=>"it is not yuor post"
        ],301);
    }
}}
