<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_name',
        'representative_name',
        'designation',
        'address',
        'office_contact',
        'email',
        'business_permit_number',
        'tin',
        'philgeps_registration_number',
        'average_rating',
        'category_id',
        'date_last_rating',
        'total_ratings',
        'supplier_website',
        'supplier_status',
        'supplier_notes',
        'archived',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
