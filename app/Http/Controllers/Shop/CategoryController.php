<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($slug = null)
    {
        $all_products =  Product::all();
        if ($slug == null) {
            $categories = Category::where('parent', 0)->get();
            $head = 'Каталог товаров';
            $products_all = Product::all();
            $products = $products_all->paginate(15);

            $colors = $products_all->pluck('color')->unique();
            $sizes = $products_all->pluck('size')->unique();

            $category_parent = Category::where('parent', 0)->get();

            $parent = null;

            return view('shop.category', compact('head','products', 'categories', 'slug', 'colors', 'sizes', 'category_parent', 'parent'));
        }
        $category = Category::where('slug', $slug)->first();
        $categories = Category::where('parent', $category->id)->get();
        $products_param = $category->products;
        $products = $category->products()->paginate(15);
        $head = $category->title;

        $meta_title = $category->meta_title;
        $meta_description = $category->meta_description;
        $meta_keywords = $category->meta_keywords;

        $colors = $products_param->pluck('color')->unique();
        $sizes = $products_param->pluck('size')->unique();

        $category_parent = Category::where('parent', $category->id)->get();

        if ($category->parent == 0) {
            $parent = 9999;
        } else {
            $parent = Category::where('id', $category->parent)->first();
        }

        return view('shop.category', compact('head','products', 'parent', 'category', 'categories', 'slug', 'colors', 'sizes', 'meta_title', 'meta_description', 'meta_keywords', 'category_parent'));
    }
}
