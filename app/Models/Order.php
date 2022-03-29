<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'address',
        'price',
        'product_id',
        'product_name',
        'product_price',
        'product_quantity',
        'quantity',
        'total',
        'payment_mode',
        'payment_id',

    ];

    public function products(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}

