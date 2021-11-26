<?php

namespace App\Imports;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToCollection, SkipsOnError, SkipsEmptyRows, WithHeadingRow
{
    use SkipsErrors;

    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            $product = Product::create([
                'id'                => $row['id'],
                'title'             => $row['title'],
                'description'       => $row['description'],
                'quantity'          => $row['quantity'],
                'price'             => $row['price'],
                'size'              => $row['size'],
                'color'             => $row['color'],
                'meta_title'        => $row['meta_title'],
                'meta_description'  => $row['meta_description'],
                'meta_keywords'     => $row['meta_keywords'],
                'image'             => 'product/' . $row['image'],
            ]);
            
            if(!empty($row['stock'])) {
               $product->update([
                    'stock' => $row['stock'],
                ]);
            }
            
            if(!empty($row['brand'])) {
               $product->update([
                    'brand' => (int)$row['brand'],
                ]);
            }
            
            if(!empty($row['popular'])) {
               $product->update([
                    'popular' => $row['popular'],
                ]); 
            }

            // Получаем все категории
            $categories = Category::all()->whereIn('title', explode(';', $row['categories']));

            // Добавляем категории к товару
            if (!empty($row['categories'])) {
                foreach ($categories as $k => $v) {
                    $product->categories()->attach($v->id);
                }
            }

            //Получаем изображение
            $images = explode(';', $row['images']);

            //Добавляем изображение
            if (!empty($row['images'])) {
                foreach ($images as $image) {
                    Image::create(['product_id' => $product->id, 'image' => 'product/' . $image]);
                }
            }

            $similar = explode(';', $row['similar']);
            
            
            if (!empty($row['similar'])) {
               $product->similar()->sync($similar); 
            }


            $attributes = explode(';', $row['attributes']);
            
            if (!empty($row['attributes'])) {
                $array = [];

                foreach ($attributes as $attribute) {
                    $arr = explode(':', $attribute);
                    $array[$arr[0]] = $arr[1];
    
                    Attribute::where('title', $arr[0])->first()->product()->attach([
                        $product->id => ['value' => $arr[1]],
                    ]);
                }
            }

        }
    }
}
