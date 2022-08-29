<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'image_url',
        'slide_images_url',
        'service_relationship',
        'product_relationship',
        'detail'
    ];
}
