<?php

namespace App\Models\POS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_details extends Model
{
    protected $table ='order_details';
    protected $fillable =[
        'order_id','product_id','qauntity','unitprice','amount','discount'
    ];
}
