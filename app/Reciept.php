<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reciept extends Model
{
    //
    protected $fillable = [
        'fee_manager_id',
        'balance',
        'discount',
        'total_fee',
        'enrollment_id',
        'paid_fee',
        'due_date',
        'number',
    ];




    public function student() {
        return $this->belongsTo('App\Enrollment' , 'enrollment_id');
    }
}
