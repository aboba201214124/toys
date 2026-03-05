<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_products')->withPivot('count');
    }


}
