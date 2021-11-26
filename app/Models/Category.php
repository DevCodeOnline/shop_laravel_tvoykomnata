<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['id','title', 'slug', 'image', 'text', 'parent', 'popular', 'meta_title', 'meta_description', 'meta_keywords'];
    public $timestamps = true;

    public function products()
    {
        return $this->belongsToMany(Product::class);
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
            return asset("uploads/category/no-image.png");
        }
        return asset("uploads/{$this->image}");
    }

}
