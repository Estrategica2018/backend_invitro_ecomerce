<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'detail',
        'price',
        'category_id',
        'service_relationship',
        'product_relationship',
        'attributes'

    ];


    public function category ()
    {
        return $this->belongsTo(Category::class);
    }
}
