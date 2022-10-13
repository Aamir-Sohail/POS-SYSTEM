<?php

namespace App\Models\POS;

// use App\Models\POS\Order;
// use App\Models\POS\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order_details extends Model
{
    protected $table ='order_details';
    protected $fillable =[
        'order_id','product_id','qauntity','unitprice','amount','discount'
    ];


    public function product()
    {
        return $this->belongsTo('App\Models\POS\Product');
    }

    public function order()
    {
        return $this->belongsTo('App\Models\POS\Order');
    }
}
