<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Enquiry;
use Faker\Generator as Faker;

$factory->define(Enquiry::class, function (Faker $faker) {
    return [
        //
        'name'=>$faker->name,
        'course_id'=>rand(1 , 5),
        'tel_no'=>$faker->phoneNumber,
        'edu'=>'+12',
        'follow_up'=>now(),
        'remarks'=>$faker->sentence,
        'address'=>$faker->address,
        'batch_id'=>rand(1 , 4),
        'father_name'=>$faker->name,
        'gender'=>rand(1 ,2),
        'email'=>$faker->unique()->safeEmail,
        'school_name'=>'dps',
        'enrolled'=>0,
        'course_id_2'=>rand(1 , 5),
    ];
});
