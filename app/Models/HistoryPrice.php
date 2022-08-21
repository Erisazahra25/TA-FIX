<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryPrice extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_detail_id',
        'buy_price',
        'sell_price'
    ];

    public function productDetail()
    {
        return $this->belongsTo(ProductDetail::class);
    }
}
