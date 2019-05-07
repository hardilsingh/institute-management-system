<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class enrollRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'name'=>'required',
            'course_id'=>'required',
            'batch_id'=>'required',
            'father_name'=>'required',
            'address'=>'required',
            'tel_no'=>'required',
            'gender'=>'required',
            'email'=>'required',
            'edu'=>'required',
            'school_name'=>'required',
            'refer_mode'=>'required',
        ];
    }
}
