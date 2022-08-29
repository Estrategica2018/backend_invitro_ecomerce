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
        'image_url',
        'slide_images_url',
        'category_id',
        'service_relationship',
        'product_relationship',
        'attributes',
        'detail'
    ];


    public function category ()
    {
        return $this->belongsTo(Category::class);
    }
}
