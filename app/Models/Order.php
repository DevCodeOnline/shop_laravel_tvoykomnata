<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'surname', 'phone', 'email', 'city', 'address', 'status'];
    public $timestamps = true;

    public function product()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
}
