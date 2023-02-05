<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'number', 'user_id', 'status', 'payment_status',
        'discount', 'tax', 'total', 'ip', 'user_agent',
        'payment_method', 'payment_transaction_id', 'payment_data'
    ];
    
}
