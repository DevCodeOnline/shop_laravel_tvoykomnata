<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(25);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title', 'id');
        $attributes = Attribute::all();
        $brands = Brand::all();
        $products = Product::all();
        return view('admin.products.create', compact('categories', 'attributes', 'brands', 'products'));
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

        $product = Product::create([
            'title'             => $request->input('title'),
            'description'       => $request->input('description'),
            'quantity'          => $request->input('quantity'),
            'price'             => $request->input('price'),
            'brand'             => (int)$request->input('brand'),
            'size'              => $request->input('size'),
            'color'             => $request->input('color'),
            'stock'             => $request->input('stock'),
            'popular'           => $request->input('popular'),
            'meta_title'        => $request->input('meta-title'),
            'meta_description'  => $request->input('meta-description'),
            'meta_keywords'     => $request->input('meta-keywords'),
        ]);

        if ($request->file('image')) {
            $product->update([
                'image' => $request->file('image')->store("product")
            ]);
        }

        if ((int)$request->input('brand') !== 0) {
            $product->update([
                'brand' => (int)$request->input('brand')
            ]);
        }

        $images = [];

        if ($request->hasFile('images')) {
            // Добавляем новые изображения в папку
            $folder = 'product';
            foreach ($request->file('images') as $key => $value) {
                $images[] = $value->store("$folder");
            }
        }

        // Сохраняем новые изображение в таблицу Image
        if ($images) {
            foreach ($images as $image) {
                Image::create(['product_id' => $product->id, 'image' => $image]);
            }
        }

        // Синхронизируем категории

        $product->categories()->sync($request->categories);

        $product->similar()->sync($request->similar);

        // Работа с атрибутами

        if ($request->input('attribute')) {
            foreach ($request->input('attribute') as $k => $v) {
                if ($v) {
                    Attribute::find($k)->product()->attach([
                        $product->id => ['value' => $v],
                    ]);
                }
            }
        }


        $request->session()->flash('success', 'Товар добавлена');

        return redirect()->route('products.index');
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
        $product = Product::find($id);
        $categories = Category::pluck('title', 'id');
        $attributes = Attribute::all();
        $brands = Brand::all();
        $product_attributes = $product->attributes;
        $products = Product::all();

        return view('admin.products.edit', compact('product', 'categories', 'attributes', 'product_attributes', 'brands', 'products'));
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

        $product = Product::find($id);

        $product->update([
            'title'             => $request->input('title'),
            'description'       => $request->input('description'),
            'quantity'          => $request->input('quantity'),
            'price'             => $request->input('price'),
            'brand'             => (int)$request->input('brand'),
            'size'              => $request->input('size'),
            'color'             => $request->input('color'),
            'stock'             => $request->input('stock'),
            'popular'           => $request->input('popular'),
            'meta_title'        => $request->input('meta-title'),
            'meta_description'  => $request->input('meta-description'),
            'meta_keywords'     => $request->input('meta-keywords'),
        ]);

        if ($request->file('image')) {
            $product->update([
                'image' => $request->file('image')->store("product")
            ]);
        }

        $images = [];

        if ($request->hasFile('images')) {
            // Добавляем новые изображения в папку
            $folder = 'product';
            foreach ($request->file('images') as $key => $value) {
                $images[] = $value->store("$folder");
            }
        }

        // Сохраняем новые изображение в таблицу Image
        if ($images) {
            foreach ($images as $image) {
                Image::create(['product_id' => $product->id, 'image' => $image]);
            }
        }

        // Обновляем категории

        $product->categories()->sync($request->categories);

        $product->similar()->sync($request->similar);

        // Обновляем атрибуты

        if ($request->input('attribute')) {
            $product->attributes()->detach();

            foreach ($request->input('attribute') as $k => $v) {
                if ($v) {
                    Attribute::find($k)->product()->attach([
                        $product->id => ['value' => $v],
                    ]);
                }
            }
        }

        $request->session()->flash('success', 'Товар изменен');

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $image = $product->image;
        $images = $product->images;

        if(is_file(public_path("uploads/$image"))) {
            unlink(public_path("uploads/$image"));
        }

        foreach ($images as $v) {
            if(is_file(public_path("uploads/$v->image"))) {
                unlink(public_path("uploads/$v->image"));
            }
        }
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Товар удален');
    }
}
