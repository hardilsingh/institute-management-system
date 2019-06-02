@extends('layouts.admin')
@section('content')
@include('includes.errors')


<div class="col-lg-12">
    <div class="card" style="width: 100%;">

        <div class="card-body">
            <h5 class="card-title">Add Course</h5>
            <div class="col-lg-12">
                {!! Form::open([
                'action'=>'CoursesController@store',
                'method'=>'POST'
                ]) !!}

                <div class="form-group">
                    {!! Form::label('name' , 'Name:') !!}
                    {!! Form::text('name' , null , ['class'=>'form-control' , 'placeholder'=>'Enter name']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('duration' , 'Duration:') !!}
                    {!! Form::select('duration' , array(''=>'Course Duration' , '30'=>'1 Month' , '45'=>'45 Days' , '90'=>'3 Months' , '180'=>'6 Months') , '' , ['class'=>'form-control']) !!}
                </div>


                <div class="form-group">
                    {!! Form::label('hours' , 'Hours:') !!}
                    {!! Form::text('hours' , null , ['class'=>'form-control' , 'placeholder'=>'Enter hours']) !!}
                </div>


                <div class="form-group">
                    {!! Form::label('fee' , 'Fee:') !!}
                    {!! Form::text('fee' , null , ['class'=>'form-control' , 'placeholder'=>'Enter fee']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('centre_id' , 'Centre:') !!}
                    {!! Form::select('centre_id' , $centres, '' , ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">

                    {!! Form::submit('Add Course' , ['class'=>'btn btn-success btn-lg']) !!}
                </div>



                {!! Form::close() !!}
            </div>
        </div>
    </div>


</div>







@endsection