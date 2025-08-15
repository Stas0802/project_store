<?php

namespace App\Models;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'slug',
        'category_id',
    ];

    /**
     * the product belongs to the category
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * the product can be in several orders
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity', 'price', 'total')->withTimestamps();
    }

    /**
     * slug is used instead of id.
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * HasSlug trait behavior when loading a model
     * @return void
     */
    protected static function booted(): void
    {
        static::bootHasSlug();
    }
}
