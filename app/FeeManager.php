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
        'slug',
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
        return $this->belongsTo('App\Course', 'course_id');
    }

    public function course2()
    {
        return $this->belongsTo('App\Course', 'course_id_2');
    }

    public function student()
    {
        return $this->belongsTo('App\Enrollment', 'enrollment_id');
    }


    public function feereciept()
    {
        return $this->hasOne('App\Reciept');
    }


    public function sms($ph, $paid_fee , $balance , $due_date)
    {
        $msg = "Payment confirmation " . "Last transaction: " . $paid_fee . " Balance: " . $balance . " Next due date: " . $due_date ;
        $number = '91' . $ph;
        $cSession = curl_init();
        curl_setopt($cSession, CURLOPT_URL, "http://my.msgwow.com/api/sendhttp.php?authkey=207485A7Y9ujYeSFT5ac45f4f&mobiles=$number&message=$msg&sender=CDACGP&route=1&country=91");
        curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cSession, CURLOPT_HEADER, false);
        $alertchk = curl_exec($cSession);
    }
}
