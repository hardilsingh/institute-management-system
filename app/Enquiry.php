<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Enquiry extends Model
{
    //
    use Sluggable;
    protected $fillable = [
        'name',
        'course_id',
        'tel_no',
        'edu',
        'follow_up',
        'remarks',
        'address',
        'start_date',
        'end_date',
        'batch_id',
        'father_name',
        'gender',
        'email',
        'school_name',
        'course_id_2',
    ];


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate'=> true,
            ]
        ];
    }


    public function course() {
        return $this->belongsTo('App\Course' , 'course_id');
    }
}
