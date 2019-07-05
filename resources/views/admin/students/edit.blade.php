@extends('layouts.admin')
@section('content')




<div class="row" style="display:flex; align-items:center">
    <div class="col-lg-5">
        <h5 class="display-4">
            Edit Profile
        </h5>
    </div>

    <div class="col-lg-5" style="display:flex; justify-content:space-between">

        <div class="alert alert-warning" style="color:darkred">
            Course 1: {{Carbon\Carbon::parse($student->date_end)->diffInDays()}} days remaining!
        </div>
        <div class="alert alert-warning" style="color:darkred" style="margin-left:20px">
            Course 2:
            @if($student->date_end_2)
            {{Carbon\Carbon::parse($student->date_end_2)->diffInDays()}} days remaining!
            @endif
            @if(!$student->date_end_2)
            N|A
            @endif
        </div>
    </div>
</div>

@include('includes.errors')

{!! Form::model($student , [

'action'=>['StudentsController@update' , $student->id],
'method'=>'PATCH'

]) !!}


{{csrf_field()}}
<div class="col-lg-12">
    <div class="row" style="margin:35px 0px">
        <div class="col-lg-4">
            <div class="form-group">
                {!! Form::label('name' , 'Name:') !!}
                {!! Form::text('name' , $student->name , ['class'=>'form-control' , 'placeholder'=>'Enter name']) !!}
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                {!! Form::label('father_name' , 'Father/Husband/Wife:') !!}
                {!! Form::text('father_name' , $student->father_name , ['class'=>'form-control' , 'placeholder'=>'Enter Father/Husband/Wife']) !!}
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                {!! Form::label('tel_no' , 'Telephone:') !!}
                {!! Form::number('tel_no' , $student->tel_no , ['class'=>'form-control' , 'placeholder'=>'Enter number']) !!}
            </div>
        </div>
    </div>
    <div class="row" style="margin:35px 0px">
        <div class="col-lg-4">
            <div class="form-group">
                {!! Form::label('gender' , 'Gender:') !!}
                {!! Form::select('gender' ,array(''=>'Select gender' , 'male'=>'Male' , 'female'=>'Female'), $student->gender , ['class'=>'form-control']) !!}
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                {!! Form::label('email' , 'Email:') !!}
                {!! Form::email('email' , $student->email , ['class'=>'form-control' , 'placeholder'=>'Enter email']) !!}
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                {!! Form::label('edu' , 'Qualification:') !!}
                {!! Form::text('edu' , $student->edu , ['class'=>'form-control' , 'placeholder'=>'Enter qualification']) !!}
            </div>
        </div>
    </div>

    <div class="row" style="margin:35px 0px">
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::label('address' , 'Address:') !!}
                {!! Form::textarea('address' , $student->address , ['class'=>'form-control' , 'placeholder'=>'Enter Address']) !!}
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::label('school_name' , 'school name:') !!}
                {!! Form::textarea('school_name' , $student->school_name , ['class'=>'form-control' , 'placeholder'=>'Enter School name']) !!}
            </div>
        </div>
    </div>

    <div class="row" style="margin:35px 0px">
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Batch</label>
                <select name="batch_id" id="" class="form-control">
                    <option value="{{$student->batch->id}}" selected>{{$student->batch->from}}:00 to {{$student->batch->to}}:00</option>
                    @foreach($batches as $batch)

                    <option value="{{$batch->id}}">{{$batch->from}}:00 to {{$batch->to}}:00</option>

                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Course</label>
                <select name="course_id" id="" class="form-control">
                    <option value="{{$student->course->id}}" selected>{{$student->course->name}}</option>
                    @foreach($courses as $course)
                    <option value="{{$course->id}}">{{$course->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Course 2</label>
                <select name="course_id_2" id="" class="form-control">
                    @if($student->course_id_2)
                    <option value="{{$student->course2->id}}" selected>{{$student->course2->name}}</option>
			<option value="" selected>Delete Course</option>

                    @endif
                    @if(!$student->course_id_2)
                    <option value="" selected>Select course 2</option>
                    @endif
                    @foreach($courses as $course)
                    <option value="{{$course->id}}">{{$course->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
    </div>
    <div class="row" style="margin:35px 0px">
        <div class="col-lg-4">
            <div class="form-group">
                @if($student->course->centre_id == 2)
                <label for="">CDAC registration no: ({{$student->course->name}})</label>
                {!! Form::text('reg_no' , null , ['class'=>'form-control']) !!}
                @endif
                
                @if($student->course2)
                @if($student->course2->centre_id == 2)
                <label for="">CDAC registration no: ({{$student->course2->name}})</label>
                {!! Form::text('reg_no' , null , ['class'=>'form-control']) !!}
                @endif
                @endif
            </div>
        </div>
    </div>
    
    <div class="row" style="margin:35px 0px">
        <div class="col-lg-3">
            <div class="form-group">
                <label for="">Date of addmission</label>
                {!! Form::date('date' , null , ['class'=>'form-control']) !!}
            </div>
        </div>
    </div>
    
    
    <div class="row" style="margin:35px 0px">
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::submit('Save' , ['class'=>'btn btn-success btn-lg']) !!}
            </div>
        </div>
    </div>
</div>

{!! Form::close() !!}








@endsection