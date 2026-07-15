<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];


    /**
     * المستخدم صاحب السلة
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /**
     * المنتج الموجود في السلة
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }


    /**
     * حساب سعر هذا العنصر
     */
    public function getTotalPriceAttribute()
    {
        return $this->quantity * $this->product->current_price;
    }
}
