<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;
    public function menu(){
        return $this->belongsTo(Menu::class);
    }
    public function orderItem(){
        return $this->hasMany(OrderItem::class);
    }
}
