<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Inventory extends Model
{
    //

    protected $fillable = ['category' , 'qty'];

    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'category',
                'onUpdate'=> true,
            ]
        ];
    }
}
