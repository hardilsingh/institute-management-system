<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class FeeManager extends Model
{
    //
    protected $fillable = [
        'enrollment_id',
        'total_fee',
        'paid_fee',
        'balance',
        'course_id',
        'due_date',
        'discount',
        'discounted_fee',
        'slug'
    ];

    use Sluggable;

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

    public function student() {
        return $this->belongsTo('App\Enrollment' , 'enrollment_id');
    }


    public function feereciept() {
        return $this->hasOne('App\Reciept');
    }


    


}
