<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    //
    protected $fillable = [
        'name',
        'course_id',
        'tel_no',
        'edu',
        'follow_up',
        'remarks',
        'address',
        'start_date',
        'end_date'
    ];


    public function course() {
        return $this->belongsTo('App\Course' , 'course_id');
    }
}
