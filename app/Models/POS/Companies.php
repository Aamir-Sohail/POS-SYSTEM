<?php

namespace App\Models\POS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $table ='companies';
    protected $fillable =[
        'company_name','company_address','company_email','company_phone','company_fax'
    ];
}
