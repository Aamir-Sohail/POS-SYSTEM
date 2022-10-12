<?php

namespace App\Models\POS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable =['product_name', 'price','description','brand','quantity','alert_stock'];


    public function orderdetails()
    {
        return $this->hasMany('App\Order_details');
    }
}
