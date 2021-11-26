<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(25);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->pluck('title', 'id');

        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
           'title' => 'required',
        ]);

        $category = Category::create([
            'title'             => $request->input('title'),
            'image'             => $request->file('image'),
            'text'              => $request->input('text'),
            'parent'            => $request->input('parent'),
            'popular'           => $request->input('popular'),
            'meta_title'        => $request->input('meta-title'),
            'meta_description'  => $request->input('meta-description'),
            'meta_keywords'     => $request->input('meta-keywords'),

        ]);

        if ($request->hasFile('image')) {
            $category->update([
                'image' => $request->file('image')->store("category"),
            ]);
        }

        $request->session()->flash('success', 'Категория добавлена');

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all()->pluck('title', 'id');
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $category = Category::find($id);

        $category->update([
            'title'             => $request->input('title'),
            'text'              => $request->input('text'),
            'parent'            => $request->input('parent'),
            'popular'           => $request->input('popular'),
            'meta_title'        => $request->input('meta-title'),
            'meta_description'  => $request->input('meta-description'),
            'meta_keywords'     => $request->input('meta-keywords'),

        ]);

        if ($request->hasFile('image')) {
            if(is_file(public_path("uploads/$category->image"))) {
                unlink(public_path("uploads/$category->image"));
            }

            $category->update([
                'image' => $request->file('image')->store("category"),
            ]);
        }

        $request->session()->flash('success', 'Категория добавлена');

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if(is_file(public_path("uploads/$category->image"))) {
            unlink(public_path("uploads/$category->image"));
        }
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Категория удалена');
    }
}
