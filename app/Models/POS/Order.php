<?php

namespace App\Models\POS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table ='orders';
    protected $fillable =[
        'name','address'
    ];

    public function orderdetails()
    {
        return $this->hasMany('App\Models\POS\Order_details');
    }
}
