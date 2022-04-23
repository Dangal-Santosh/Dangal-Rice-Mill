<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    use HasFactory;
    use Sortable;
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['id','name', 'price','units','quantity','price','total','product_name', 'category_id','in_stock_id'];

    // public $sortable = ['name', 'price'];

    public function categories(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function in_stocks(){
        return $this->belongsTo(InStock::class,'in_stock_id','id');
    }
}
