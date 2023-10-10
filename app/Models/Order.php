<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'email', 'phone', 'total_price'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Если у вас есть модель OrderItem, можно добавить следующее отношение
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
