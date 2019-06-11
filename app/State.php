<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    //
    protected $fillable = ['start_date' , 'end_date' , 'collection' , 'balance'];
}
