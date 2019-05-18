<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

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
        'reg_no',
        'date_join',
        'course_id_2'
    ];

    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true,
            ]
        ];
    }

    public function course()
    {
        return $this->belongsTo('App\Course');
    }


    public function course2()
    {
        return $this->belongsTo('App\Course', 'course_id_2');
    }

    public function batch()
    {
        return $this->belongsTo('App\Batch');
    }


    public function feemanager_id()
    {
        return $this->hasOne('App\FeeManager');
    }

    public function sms($ph , $reg_id)
    {
        $msg = "Welcome to cba infotech. Your registration number is " . $reg_id . ". Please keep this number for future refrence";
        $number = '91' . $ph;
        $cSession = curl_init();
        curl_setopt($cSession, CURLOPT_URL, "http://my.msgwow.com/api/sendhttp.php?authkey=207485A7Y9ujYeSFT5ac45f4f&mobiles=$number&message=$msg&sender=CDACGP&route=1&country=91");
        curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cSession, CURLOPT_HEADER, false);
        $alertchk = curl_exec($cSession);
    }
}
