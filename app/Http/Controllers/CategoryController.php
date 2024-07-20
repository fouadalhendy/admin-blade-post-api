<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=category::all();

        return view('admin.category',compact('categories'));
    }

    /*     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.creatcate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //  'titel',  'imge', 'content'
        $val=$request->validate([
            'titel'=>'required|string|max:25',
            'content'=>'required|string',
            'imge'=>'required|image'
        ]);

        $category = new category;
        if ($request->hasFile("imge")) {
            $imge = $request->imge;
            $imgname = time() . '.' . $imge->getClientOriginalExtension();
            $imge->move(public_path('imges'), $imgname);
        }


        $category->titel = $val['titel'];
        $category->content = $val['content'];
        $category->imge = $imgname;
        $category->save();


        return redirect()->route('cate.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        return view('admin.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
        $val=$request->validate([
            'titel'=>'required|string|max:25',
            'content'=>'required|string',
            'imge'=>'image'
        ]);
        $imgname=$category->imge;
        $category1 = category::findorfail($category->id);
        if ($request->hasFile("imge")) {
            $imge = $request->imge;
            $imgname = time() . '.' . $imge->getClientOriginalExtension();
            $imge->move(public_path('imges'), $imgname);
        }


        $category1->titel = $val['titel'];
        $category1->content = $val['content'];
        $category1->imge = $imgname;
        $category1->save();


        return redirect()->route('cate.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        
        $category->delete();
        return redirect()->route('cate.index');
    }
}
