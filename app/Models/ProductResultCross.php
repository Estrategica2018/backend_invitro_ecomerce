<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductResultCross extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'product_one_id',
        'product_two_id',
        'result'
    ];

    public function service ()
    {
        return $this->belongsTo(Service::class);
    }

    public function product_one ()
    {
        return $this->belongsTo(Product::class,'product_one_id','id');
    }

    public function product_two ()
    {
        return $this->belongsTo(Product::class,'product_two_id','id');
    }
}
