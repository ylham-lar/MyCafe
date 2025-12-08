<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];

    public $timestamps = true;

    protected $fillable = [
        'category_id',
        'name',
        'name_ru',
        'name_tm',
        'description',
        'description_ru',
        'description_tm',
        'price',
        'discount_percent',
        'weight',
        'code',
        'image',
    ];


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function favorites(): BelongsToMany
    {
        return $this->belongsToMany(Favorite::class, 'favorites');
    }
    public function getName()
    {
        $locale = app()->getLocale();

        if ($locale == 'tm') {
            return $this->name_tm ?: $this->name;
        } else if ($locale == 'ru') {
            return $this->name_ru ?: $this->name;
        }
        return $this->name;
    }
    public function getDescription()
    {
        $locale = app()->getLocale();

        if ($locale == 'tm') {
            return $this->description_tm ?: $this->description;
        } else if ($locale == 'ru') {
            return $this->description_ru ?: $this->description;
        }
        return $this->description;
    }
}
