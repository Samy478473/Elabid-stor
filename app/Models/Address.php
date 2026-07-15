<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'phone',
        'country',
        'city',
        'area',
        'street',
        'building',
        'floor',
        'apartment',
        'notes',
        'is_default',
    ];

    protected $casts = [
        'is_default' => 'boolean',
    ];


    /**
     * صاحب العنوان
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /**
     * الطلب المرتبط بهذا العنوان
     */
    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
