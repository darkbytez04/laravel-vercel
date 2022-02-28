<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
      protected $table = 'products';
    protected $fillable = ['product_name', 'price' ,
    'alert_stock', 'quantity' , 'brand', 'description'];
    use HasFactory;

    public function orderdetail(){
      return $this->hasMany('App\Models\Order_Detail');
  }
}
