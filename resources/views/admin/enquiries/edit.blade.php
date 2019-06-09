@extends('layouts.admin')
@section('content')

<div class="row" style="margin-bottom:50px">
    <div class="col-lg-12">
        <h6 class="display-4">
            Enquiry
        </h6>
    </div>
</div>

@if(Session::has('enq_updated'))
<div class="row" style="margin-bottom:50px">
    <div class="col-lg-6">
        <div class="alert alert-success">{{session('enq_updated')}}</div>
    </div>
</div>
@endif


<div class="col-lg-12">
    <div class="row">
        <div class="col-lg-12">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title">{{$enquiry->name}}</h5>
                    <table class="table text-capitalize">
                        <tbody>
                            <tr>
                                <td>Course 1:</td>
                                <td>{{$enquiry->course->name}} </td>
                            </tr>
                            <tr>
                                <td>Course 2:</td>
                                <td>
                                    @if($enquiry->course2)
                                    {{$enquiry->course2->name}}
                                    @endif
                                    @if(!$enquiry->course2)
                                    Not Enrolled
                                    @endif

                                </td>
                            </tr>
                            <tr>
                                <td>Father Name:</td>
                                <td>{{$enquiry->father_name}}</td>
                            </tr>
                            <tr>
                                <td>address:</td>
                                <td>{{$enquiry->address}}</td>
                            </tr>
                            <tr>
                                <td>Mobile:</td>
                                <td>{{$enquiry->tel_no}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="row">
        <div class="col-lg-12">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <h5>Update</h5>

                    {!! Form::model($enquiry , [
                    'action'=>['EnquiriesController@update' , $enquiry->id],
                    'method'=>'PATCH'
                    ]) !!}

                    {!! csrf_field() !!}

                    <div class="form-group">
                        {!! Form::label('follow_up' , 'Next Follow Up' , []) !!}
                        {!! Form::date('follow_up' , null , ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('remarks' , 'Remarks' , []) !!}
                        {!! Form::textarea('remarks' , null , ['class'=>'form-control']) !!}
                    </div>

                </div>
                <div class="col-lg-12">
            <div class="row" style="margin:35px 0px">
                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::label('name' , 'Name:') !!}
                        {!! Form::text('name' , $enquiry->name , ['class'=>'form-control' , 'placeholder'=>'Enter name']) !!}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::label('father_name' , 'Father/Husband/Wife:') !!}
                        {!! Form::text('father_name' , $enquiry->father_name  , ['class'=>'form-control' , 'placeholder'=>'Enter Father/Husband/Wife']) !!}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::label('tel_no' , 'Telephone:') !!}
                        {!! Form::number('tel_no' , $enquiry->tel_no , ['class'=>'form-control' , 'placeholder'=>'Enter number']) !!}
                    </div>
                </div>
            </div>
            <div class="row" style="margin:35px 0px">
                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::label('gender' , 'Gender:') !!}
                        {!! Form::select('gender' ,array(''=>'Select gender' , 'male'=>'Male' , 'female'=>'Female'), $enquiry->gender , ['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::label('email' , 'Email:') !!}
                        {!! Form::email('email' , $enquiry->email , ['class'=>'form-control' , 'placeholder'=>'Enter email']) !!}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::label('edu' , 'Qualification:') !!}
                        {!! Form::text('edu' , $enquiry->edu , ['class'=>'form-control' , 'placeholder'=>'Enter qualification']) !!}
                    </div>
                </div>
            </div>

            <div class="row" style="margin:35px 0px">
                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::label('address' , 'Address:') !!}
                        {!! Form::textarea('address' , $enquiry->address , ['class'=>'form-control' , 'placeholder'=>'Enter Address']) !!}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        {!! Form::label('school_name' , 'school name:') !!}
                        {!! Form::textarea('school_name' , $enquiry->school_name , ['class'=>'form-control' , 'placeholder'=>'Enter School name']) !!}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="">Batch</label>
                        <select name="batch_id" id="" class="form-control">
                            <option value={{$enquiry->batch_id}} selected>{{$enquiry->batch->from}}:00 - {{$enquiry->batch->to}}:00</option>
                            @foreach($batches as $batch)

                            <option value="{{$batch->id}}">{{$batch->from}}:00 to {{$batch->to}}:00</option>

                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row" style="margin:35px 0px">
                
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="">Course</label>
                        <select name="course_id" id="" class="form-control">
                            <option value={{$enquiry->course_id}} selected>{{$enquiry->course->name}}</option>
                            @foreach($courses as $course)

                            <option value="{{$course->id}}">{{$course->name}}</option>

                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row" style="margin:35px 0px">
                <div class="col-lg-3">
                    <div class="form-group">
                        {!! form::submit('Save &rarr;' , ['class'=>' btn btn-success'])!!}
                    </div>


                    {!! Form::close() !!}
                </div>
            </div>
        </div>
            </div>
        </div>
    </div>
</div>


@endsection