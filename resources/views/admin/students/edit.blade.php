@extends('layouts.admin')
@section('content')

<h5 class="display-4">
    Edit Profile
</h5>
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
                <label for="">How did you hear about us:</label>
                <select name="refer_mode" id="" class="form-control">
                    <option value="ad">Newspaper Ad</option>
                    <option value="posters">Other form of advertiesment</option>
                    <option value="friends">Friends/OldStudents</option>
                    <option value="other">Other</option>
                </select>
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