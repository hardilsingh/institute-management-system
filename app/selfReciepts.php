<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class selfReciepts extends Model
{
    //

    protected $fillable = ['number' , 'name' , 'paid_fee', 'item'];
}
