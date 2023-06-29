<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'product_name',
        'color',
        'size',
        'qty',
        'single_price',
        'total_price',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
