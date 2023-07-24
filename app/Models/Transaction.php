<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'transaction_date',
        'transaction_details',
        'price',
        'quality_rating',
        'delivery_rating',
        'pricing_rating',
        'customer_service_rating',
        'reliability_rating',
        'comment',
        'remarks',
        'user_id',
        'archived',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
