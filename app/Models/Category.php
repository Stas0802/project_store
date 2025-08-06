<?php

namespace App\Models;


use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = ['name', 'image', 'slug'];

    public function products(){
        return $this->hasMany(Product::class, 'categories_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static function booted(){
        static::bootHasSlug();
    }
}
