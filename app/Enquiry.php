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

    public function course2() {
        return $this->belongsTo('App\Course' , 'course_id_2');
    }

    // public function sms($ph, $name , $follow_up)
    // {
    //     $msg = "Thankyou for contacting CBA Infotech " . $name . "We fill follow you up on " . $follow_up ;
    //     $number = '91' . $ph;
    //     $cSession = curl_init();
    //     curl_setopt($cSession, CURLOPT_URL, "http://my.msgwow.com/api/sendhttp.php?authkey=207485A7Y9ujYeSFT5ac45f4f&mobiles=$number&message=$msg&sender=CDACGP&route=1&country=91");
    //     curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($cSession, CURLOPT_HEADER, false);
    //     $alertchk = curl_exec($cSession);
    // }
}
