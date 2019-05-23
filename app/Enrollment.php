<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\FeeManager;
use App\Docs;
use Illuminate\Support\Carbon;

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
        'course_id_2',
        'date_end',
        'date_end_2',
        'date_join_2'
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

    public function sms($ph, $reg_id)
    {
        $msg = "Welcome to cba infotech. Your registration number is " . $reg_id . ". Please keep this number for future reference.";
        $number = '91' . $ph;
        $cSession = curl_init();
        curl_setopt($cSession, CURLOPT_URL, "http://my.msgwow.com/api/sendhttp.php?authkey=207485A7Y9ujYeSFT5ac45f4f&mobiles=$number&message=$msg&sender=CDACGP&route=1&country=91");
        curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cSession, CURLOPT_HEADER, false);
        $alertchk = curl_exec($cSession);
    }

    public static function createFeeManager($id, $course_id, $slug, $course_id_2)
    {
        $fee_id = FeeManager::create([
            'enrollment_id' => $id,
            'course_id' => $course_id,
            'slug' => $slug,
            'course_id_2' => $course_id_2
        ]);

        return $fee_id;
    }


    public static function createDocs($id, $course_id, $course_id_2)
    {
        Docs::create([
            'enrollment_id' => $id,
            'course_id' => $course_id,
            'course_id_2' => $course_id_2
        ]);
    }


    public static function endgame($date_join, $course_duration)
    {
        $start_date = Carbon::parse($date_join);
        $end_date = $start_date->addDays($course_duration);

        return $end_date;
    }



    public function calculateLeftDays($date_join , $date_end)
    {
        $start_date = Carbon::parse($date_join);
        $end_date = Carbon::parse($date_end);
        $diff = $start_date->diffInDays($end_date);
        return $diff;
    }
}
