<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_detail_id',
        'amount',
        'price',
        'buy_price',
    ];

    public function productDetail()
    {
        return $this->belongsTo(ProductDetail::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function totalDp(){

    }
}
