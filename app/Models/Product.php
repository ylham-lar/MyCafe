<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    protected $guarded = [
        'id',
    ];

    public $timestamps = true;

    protected $fillable = [
        'category_id',
        'name',
        'price',
        'code',
        'description',
        'image',
        'discount_percent',
        'weight',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function favorites(): BelongsToMany
    {
        return $this->belongsToMany(Favorite::class, 'favorites');
    }
}
