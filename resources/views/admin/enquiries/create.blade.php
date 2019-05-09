@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h5 class="display-4">
            Create Enquiry
        </h5>
    </div>
</div>

@include('includes.errors')

{!! Form::open( [

'action'=>'EnquiriesController@store',
'method'=>'POST'

]) !!}

{{csrf_field()}}
<div class="col-lg-12">
    <div class="row" style="margin:35px 0px">
        <div class="col-lg-4">
            <div class="form-group">
                {!! Form::label('name' , 'Name:') !!}
                {!! Form::text('name' , null , ['class'=>'form-control' , 'placeholder'=>'Enter name']) !!}
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                {!! Form::label('tel_no' , 'Telephone:') !!}
                {!! Form::number('tel_no' , null , ['class'=>'form-control' , 'placeholder'=>'Enter number']) !!}
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                {!! Form::label('edu' , 'Qualification:') !!}
                {!! Form::text('edu' , null , ['class'=>'form-control' , 'placeholder'=>'Enter qualification']) !!}
            </div>
        </div>
    </div>

    <div class="row" style="margin:35px 0px">
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::label('address' , 'Address:') !!}
                {!! Form::textarea('address' , null , ['class'=>'form-control' , 'placeholder'=>'Enter Address']) !!}
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::label('remarks' , 'Remarks:') !!}
                {!! Form::textarea('remarks' , null , ['class'=>'form-control' , 'placeholder'=>'Enter Remarks']) !!}
            </div>
        </div>
    </div>

    <div class="row" style="margin:35px 0px">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="">Course</label>
                <select name="course_id" id="" class="form-control">
                    <option value="" selected>Select a course</option>
                    @foreach($courses as $course)
                    <option value="{{$course->id}}">{{$course->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="">Follow Up</label>
                {!! Form::date('follow_up' , null , ['class'=>'form-control' , 'placeholder'=>'Enter Follow Up']) !!}
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