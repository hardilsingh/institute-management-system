@extends('layouts.admin')
@section('content')

<div class="col-lg-12">
<h5 class="display-4">
    Edit Course
</h5>
</div>

@include('includes.errors')

<div class="col-lg-12">
    <div class="col-lg-12">
        {!! Form::model( $course , [
        'action'=>['CoursesController@update' , $course->id],
        'method'=>'PATCH'
        ]) !!}

        <div class="form-group">
            {!! Form::label('name' , 'Name:') !!}
            {!! Form::text('name' , $course->name , ['class'=>'form-control' , 'placeholder'=>'Enter name']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('duration' , 'Duration:') !!}
            {!! Form::select('duration' , array(''=>'Course Duration' , '30'=>'1 Month' , '45'=>'45 Days' , '91'=>'3 Months' , '180'=>'6 Months') , $course->duration ,  ['class'=>'form-control']) !!}
        </div>

        
        <div class="form-group">
            {!! Form::label('hours' , 'Hours:') !!}
            {!! Form::text('hours' , $course->hours , ['class'=>'form-control' , 'placeholder'=>'Enter hours']) !!}
        </div>
        

        <div class="form-group">
            {!! Form::label('fee' , 'Fee:') !!}
            {!! Form::text('fee' , $course->fee , ['class'=>'form-control' , 'placeholder'=>'Enter fee']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('centre_id' , 'Centre:') !!}
            {!! Form::select('centre_id' , $centres , $course->course_id  , ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            
            {!! Form::submit('Update Course' , ['class'=>'btn btn-success btn-lg']) !!}
        </div>
        
        

        {!! Form::close() !!}
    </div>

</div>







@endsection