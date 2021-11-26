<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    use Sluggable;


    protected $fillable = ['id', 'title', 'image', 'popular', 'meta_title', 'meta_description', 'meta_keywords'];
    public $timestamps = true;

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
            return asset("uploads/brand/no-image.png");
        }
        return asset("uploads/{$this->image}");
    }
}
