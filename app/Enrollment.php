<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    //
    protected $fillable = [

        'course_id',
        'batch_id',
        'name',
        'father_name',
        'address',
        'tel_no',
        'gender',
        'email',
        'edu',
        'school_name',
        'refer_mode',
        'reg_no'


    ];

    public function course() {
        return $this->belongsTo('App\Course');
    }

    public function batch() {
        return $this->belongsTo('App\Batch');
    }
}
