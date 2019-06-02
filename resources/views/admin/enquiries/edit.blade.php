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

<!-- Books issue -->
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

                    <div class="form-group">
                        {!! form::submit('Save &rarr;' , ['class'=>' btn btn-success'])!!}
                    </div>


                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection