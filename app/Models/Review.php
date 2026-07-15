<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'rating',
        'comment',
        'status',
    ];

    protected $casts = [
        'rating' => 'integer',
        'status' => 'boolean',
    ];


    /**
     * المستخدم صاحب التقييم
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /**
     * المنتج الذي تم تقييمه
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
