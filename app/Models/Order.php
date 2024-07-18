<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $fillable = [
        'product_name',
        'user_id',
        'order_number',
        'price',
    ];


    public function userSingle(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function userMany(){
        return $this->belongsToMany(User::class, 'user_id');
    }
}
