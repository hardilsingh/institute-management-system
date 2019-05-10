<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{


    //
    use Sluggable;

    protected $fillable = [
        'name',
        'duration',
        'hours',
        'centre_id',
        'fee',
        'slug'
    ];


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true,
            ]
        ];
    }


    public function centre()
    {
        return $this->belongsTo('App\Centre');
    }
}
