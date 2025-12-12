<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];
    public $timestamps = true;
    protected $fillable = [
        'customer_id',
        'products',  
        'price',
        'payment_method',
        'status',
    ];

    protected $casts = [
        'products' => 'array',  
        'payment_method' => 'boolean',
    ];


    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
