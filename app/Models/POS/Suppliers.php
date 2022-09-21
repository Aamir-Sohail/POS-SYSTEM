<?php

namespace App\Models\POS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    protected $table ='suppliers';
    protected $fillable =[
        'suppliers_name','suppliers_address','suppliers_email','suppliers_phone'
    ];
}
