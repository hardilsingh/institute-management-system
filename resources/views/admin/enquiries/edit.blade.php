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



<div class="col-lg-12" style="margin-bottom:30px;">
    <div class="row">
        <div class="col-lg-5">
            <table class="table table-bordered text-uppercase">
                <thead>
                    <tr>
                        <td>Particulars</td>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>Name:</td>
                        <td>{{$enquiry->name}}</td>
                    </tr>
                    <tr>
                        <td>Telephone</td>
                        <td>{{$enquiry->tel_no}}</td>
                    </tr>
                    <tr>
                        <td>Course:</td>
                        <td>{{$enquiry->course->name}}</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>{{$enquiry->address}}</td>
                    </tr>

                    <tr>
                        <td>Education</td>
                        <td>{{$enquiry->edu}}</td>
                    </tr>
                    <tr>
                        <td>Follow up</td>
                        <td>{{$enquiry->follow_up}}</td>
                    </tr>
                    <tr>
                        <td>Remarks</td>
                        <td>{{$enquiry->remarks}}</td>
                    </tr>

                </tbody>
            </table>
        </div>
        <div class="col-lg-7" style="margin-top:100px">
            {!! Form::model($enquiry , [
            'action'=>['EnquiriesController@update' , $enquiry->id],
            'method'=>'PATCH',
            ])!!}

            <div class="form-group">
                {!! Form::label('follow_up' , 'Next Follow Up:') !!}
                {!! Form::date('follow_up' , 0 , ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('remarks' , 'Remarks:') !!}
                {!! Form::textarea('remarks' , $enquiry->remarks , ['class'=>'form-control' , 'placeholder'=>'Enter new remarks']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update' , ['class'=>'btn btn-primary']) !!}
            </div>

            {!!Form::close()!!}
        </div>
    </div>
</div>


@endsection