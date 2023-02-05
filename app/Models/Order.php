<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'number', 'user_id', 'status', 'payment_status',
        'discount', 'tax', 'total', 'ip', 'user_agent',
        'payment_method', 'payment_transaction_id', 'payment_data'
    ];
    protected static function booted()
    {
        static::creating(function(Order $order) {
            // 202200001, 202200002
            $now = Carbon::now();

            // SELECT MAX(number) FROM orders WHERE YEAR(created_at) = 2022
            $number = Order::whereYear('created_at', $now->year)->max('number');
            if (!$number) {
                $number = $now->year . '00001';
            } else {
                $number++;
            }

            $order->number = $number;
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user-id', 'id');
    }

    public function addresses()
    {
        return $this->hasMany(OrderAddress::class, 'order_id');
    }


    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function products()
    {
        return $this->belongsToMany(
            Product::class, 'order_items', 'order_id', 'product_id'
        );
    }


}
