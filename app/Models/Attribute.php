<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = ['title'];
    public $timestamps = false;

    public function product()
    {
        return $this->belongsToMany(Product::class, 'attribute_product')->withPivot('value');
    }

}
