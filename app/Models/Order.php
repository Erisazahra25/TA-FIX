<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'shipping_price_id',
        'shipping_address',
        'status',
        'payment_proof',
        'payment_proof_final',
        'dp',
        'totalDp',
    ];

    const STATUS_OPTION = [
        'draft',
        'pending_payment',
        'success_payment',
        'done',
    ];

    public function nextStatus()
    {
        $index = 0;
        foreach (self::STATUS_OPTION as $i => $item) {
            if ($item == $this['status']) {
                $index = $i;
                break;
            }
        }

        return self::STATUS_OPTION[$index + 1];
    }

    public function shippingPrice()
    {
        return $this->belongsTo(ShippingPrice::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function getTotalItemAttribute()
    {
        return $this->orderDetails()->count();
    }

    public function getTotalWeightAttribute()
    {
        return $this->orderDetails()->sum('amount');
    }

    public function totalShippingPrice()
    {
        $price = $this->shippingPrice['price'];
        $weight = $this->orderDetails()->sum('amount');
        return $price * $weight;
    }

    public function getTotalShippingPriceAttribute()
    {
        return formatPrice($this->totalShippingPrice());
    }

    public function getAmountAttribute()
    {
        return formatPrice($this->amount());
    }

    public function getModalAttribute()
    {
        return formatPrice($this->modal());
    }

    public function getPajakAttribute()
    {
        return formatPrice(0.25/100*($this->amount() - $this->modal()));
    }

    public function getUntungAttribute()
    {
        return formatPrice(($this->amount() - $this->modal() - $this->pajak()));

    }

    public function pajak()
    {
        return (0.25/100*($this->amount() - $this->modal()));
    }

    public function amount()
    {
        $total = 0;
        foreach ($this->orderDetails()->get() as $orderDetail) {
            $total += $orderDetail['amount'] * $orderDetail['price'];
        }

        return $total;
    }

    public function getTotalPaymentAttribute()
    {
        return ($this->totalShippingPrice() + $this->amount());

    }

    public function modal()
    {
        $total = 0;
        foreach ($this->orderDetails()->get() as $orderDetail) {
            $total += $orderDetail['amount'] * $orderDetail['buy_price'];
        }

        return $total;
    }


}
