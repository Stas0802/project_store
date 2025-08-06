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
        'categories_id',
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'categories_id');
    }

    public function orders(){
        return $this->belongsToMany(Order::class)->withPivot('quantity')->withTimestamps();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static function booted(){
        static::bootHasSlug();
    }
}
