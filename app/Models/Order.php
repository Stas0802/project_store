<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'costumer_name',
        'costumer_surname',
        'phone_number',
        'delivery',
        'status_id',
    ];

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('quantity')->withTimestamps();
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }
}
