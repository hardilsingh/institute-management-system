<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issued extends Model
{
    //

    protected $fillable = ['enrollment_id' , 'book_id' , 'code'];


    public function books() {
        return $this->belongsTo('App\Book' , 'book_id');
    }
}
