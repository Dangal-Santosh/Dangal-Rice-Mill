<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfflinePayment extends Model
{
    use HasFactory;
    protected $table = 'offline_payments';
    protected $primarykey = 'offline_payments_id';
    protected $fillable = ['id','name', 'email','address','price','product_id','quantity','total','order_id'];


    public function products(){
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function orders(){
        return $this->belongsTo(Order::class,'order_id','id');
    }
}
