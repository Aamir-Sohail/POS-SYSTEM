<?php

namespace App\Models\POS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transcation extends Model
{
    protected $table ='transcations';
    protected $fillable =[
        'order_id','paid_amount','payment_methode','balance','user_id','transac_date','transac_amount'
    ];
}
