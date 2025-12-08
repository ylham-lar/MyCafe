<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $guarded = [
        'id',
    ];

    public $timestamps = true;

    protected $fillable = [
        'name',
        'name_ru',
        'name_tm',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
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
}
