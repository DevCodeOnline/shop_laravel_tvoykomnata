<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Product;
use Illuminate\View\Component;

class ListingCategory extends Component
{
    public $products;
    public $color;
    public $size;
    public $price_from;
    public $price_to;
    public $sort;
    public $value;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        if (request()->slug) {
            $category = Category::where('slug', request()->slug)->first();
            $this->products = $category->products()->get();
        } else {
            $this->products = Product::all();
        }

        if (request()->price_from) {
            $this->price_from = request()->price_from;
        } else {
            $this->price_from = 0;
        }

        if (request()->price_to) {
            $this->price_to = request()->price_to;
        } else {
            $this->price_to = 999999;
        }

        if (request()->color) {
            $this->color = request()->color;
        } else {
            $this->color = Product::all()->pluck('color')->toArray();
        }

        if (request()->size) {
            $this->size = request()->size;
        } else {
            $this->size = Product::all()->pluck('size')->toArray();
        }

        if (request()->sort) {
            $arr = explode('[', trim(request()->sort, ']'));
            $this->sort = array_shift($arr);
            $this->value = array_shift($arr);
        } else {
            $this->sort = 'sort';
            $this->value = 'asc';
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $products = $this->products;
        if($this->value == 'asc') {
            $products_all = $products->whereIn('color', $this->color)->whereIn('size', $this->size)->whereBetween('price', [$this->price_from, $this->price_to])->sortBy($this->sort)->paginate(15);
        } else {
            $products_all = $products->whereIn('color', $this->color)->whereIn('size', $this->size)->whereBetween('price', [$this->price_from, $this->price_to])->sortByDesc($this->sort)->paginate(15);
        }

        return view('components.listing-category', compact('products_all'));
    }

    public function update()
    {

        if (request()->slug) {
            $category = Category::where('slug', request()->slug)->first();
            $this->products = $category->products;
        } else {
            $this->products = Product::all();
        }

        if (request()->price_from) {
            $this->price_from = request()->price_from;
        }
        if (request()->price_to) {
            $this->price_to = request()->price_to;
        }

        if (request()->color) {
            $this->color = request()->color;
        }

        if (request()->size) {
            $this->size = request()->size;
        }

        if (request()->sort) {
            $arr = explode('[', trim(request()->sort, ']'));
            $this->sort = array_shift($arr);
            $this->value = array_shift($arr);
        }

        return $this->render();

    }
}
