<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table="payments";
    protected $primaryKey = 'id';

    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function products(){
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function orders(){
        return $this->belongsTo(Order::class,'order_id','id');
    }
}
