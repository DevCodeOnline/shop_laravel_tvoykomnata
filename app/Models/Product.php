<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['id', 'title', 'slug', 'description', 'quantity', 'price', 'image', 'brand', 'size', 'color', 'stock', 'popular' ,'meta_title', 'meta_description', 'meta_keywords'];
    public $timestamps = true;

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class)->withPivot('value');
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function order()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity');
    }

    public function similar()
    {
        return $this->belongsToMany(Product::class, 'product_similar', 'product_id', 'similar_id');
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getImage()
    {
        if (!$this->image) {
            return asset("uploads/product/no-image.png");
        }
        return asset("uploads/{$this->image}");
    }
}
