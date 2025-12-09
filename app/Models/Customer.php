<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public $timestamps = true;

    protected $fillable = [
        'address',
        'phone',
    ];

    public function favorites(): BelongsToMany
    {
        return $this->belongsToMany(Favorite::class, 'favorites');
    }
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
