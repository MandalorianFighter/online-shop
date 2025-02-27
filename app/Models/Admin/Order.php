<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'payment_type',
        'payment_id',
        'paying_amount',
        'balance_transaction',
        'order_id',
        'subtotal',
        'shipping',
        'vat',
        'total',
        'status',
        'return_order',
        'month',
        'date',
        'year',
    ];

    protected $dates = ['date'];

    // protected $dateFormat = 'd-m-y';

    protected $with = ['user:id,name,phone'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
