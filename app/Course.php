<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $fillable =[
        'name',
        'duration',
        'hours',
        'centre_id',
        'fee'
    ];


    public function centre() {
        return $this->belongsTo('App\Centre');
    }
}
