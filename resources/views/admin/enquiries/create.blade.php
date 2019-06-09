@extends('layouts.admin')
@section('content')

@include('includes.errors')

<div class="card" style="width: 100%;">
    <div class="card-body">
        <h5 class="card-title">Create Enquiry</h5>
        {!! Form::open([

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
                        {!! Form::label('father_name' , 'Father/Husband/Wife:') !!}
                        {!! Form::text('father_name' , null , ['class'=>'form-control' , 'placeholder'=>'Enter Father/Husband/Wife']) !!}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::label('tel_no' , 'Telephone:') !!}
                        {!! Form::number('tel_no' , null , ['class'=>'form-control' , 'placeholder'=>'Enter number']) !!}
                    </div>
                </div>
            </div>
            <div class="row" style="margin:35px 0px">
                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::label('gender' , 'Gender:') !!}
                        {!! Form::select('gender' ,array(''=>'Select gender' , 'male'=>'Male' , 'female'=>'Female'), '' , ['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::label('email' , 'Email:') !!}
                        {!! Form::email('email' , null , ['class'=>'form-control' , 'placeholder'=>'Enter email']) !!}
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
                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::label('address' , 'Address:') !!}
                        {!! Form::textarea('address' , null , ['class'=>'form-control' , 'placeholder'=>'Enter Address']) !!}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::label('school_name' , 'school name:') !!}
                        {!! Form::textarea('school_name' , null , ['class'=>'form-control' , 'placeholder'=>'Enter School name']) !!}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::label('remarks' , 'Remarks:') !!}
                        {!! Form::textarea('remarks' , null , ['class'=>'form-control' , 'placeholder'=>'Enter Remarks']) !!}
                    </div>
                </div>
            </div>

            <div class="row" style="margin:35px 0px">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="">Batch</label>
                        <select name="batch_id" id="" class="form-control">
                            <option value="" selected>Select batch</option>
                            @foreach($batches as $batch)

                            <option value="{{$batch->id}}">{{$batch->from}}:00 to {{$batch->to}}:00</option>

                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="">Course</label>
                        <select name="course_id" id="" class="form-control">
                            <option value="" selected>Select course</option>
                            @foreach($courses as $course)

                            <option value="{{$course->id}}">{{$course->name}}</option>

                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="">Course 2</label>
                        <select name="course_id_2" id="" class="form-control">
                            <option value="" selected>Select course 2</option>
                            @foreach($courses as $course)

                            <option value="{{$course->id}}">{{$course->name}}</option>

                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="">Follow up Date</label>
                        {!! Form::date('follow_up', null , ['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
             <div class="row" style="margin:35px 0px">
                <div class="col-lg-3">
                     <div class="form-group">
                        <label for="">Date Of Enquiry</label>
                        {!! Form::date('date', null , ['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="row" style="margin:35px 0px">
                <div class="col-lg-3">
                    <div class="form-group">
                        {!! Form::submit('Enquiry' , ['class'=>'btn btn-success btn-lg']) !!}
                    </div>
                </div>
            </div>
        </div>

        {!! Form::close() !!}
    </div>
</div>




@endsection