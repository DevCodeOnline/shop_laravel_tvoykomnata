<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::paginate(25);
        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create');
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

        $brand = Brand::create([
           'title'    => $request->input('title'),
           'popular'  => $request->input('popular'),
           'meta_title'        => $request->input('meta-title'),
           'meta_description'  => $request->input('meta-description'),
           'meta_keywords'     => $request->input('meta-keywords'),
        ]);

        if ($request->file('image')) {
            $brand->update([
                'image' => $request->file('image')->store("brand")
            ]);
        }

        $request->session()->flash('success', 'Бренд добавлен');

        return redirect()->route('brands.index');
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
        $brand = Brand::find($id);
        return view('admin.brands.edit', compact('brand'));
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

        $brand = Brand::find($id);

        $brand->update([
           'title'      => $request->input('title'),
           'popular'    => $request->input('popular'),
           'meta_title'        => $request->input('meta-title'),
           'meta_description'  => $request->input('meta-description'),
           'meta_keywords'     => $request->input('meta-keywords'),
        ]);

        if ($request->file('image')) {
            $brand->update([
                'image' => $request->file('image')->store("brand")
            ]);
        }

        $request->session()->flash('success', 'Бренд изменен');

        return redirect()->route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect()->route('brands.index')->with('success', 'Бренд удален');
    }
}
