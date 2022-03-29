<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Spatie\MediaLibrary\HasMedia\HasMedia;
// use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['id','name', 'price','units','quantity','price','total','product_name', 'category_id','in_stock_id'];

    public function categories(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function in_stocks(){
        return $this->belongsTo(InStock::class,'in_stock_id','id');
    }
}
