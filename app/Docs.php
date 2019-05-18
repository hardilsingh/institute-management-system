<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docs extends Model
{
    //
    protected $fillable = [
        'books',
        'id_card',
        'certificate',
        'enrollment_id',
        'course_id',
        'course_id_2',
        'certificate_number',

    ];


    public function course()
    {
        return $this->belongsTo('App\Course');
    }


    public function course2()
    {
        return $this->belongsTo('App\Course', 'course_id_2');
    }

    public function student() {
        return $this->belongsTo('App\Enrollment' , 'enrollment_id');
    }
}
