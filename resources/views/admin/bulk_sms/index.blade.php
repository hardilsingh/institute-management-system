@extends('layouts.admin')

@section('content')
@include('includes.errors')

<div class="row" style="margin-bottom:30px">
    <div class="col-lg-12">
        <h5 class="display-4">
            Send Bulk SMS
        </h5>
    </div>
</div>

@if(Session::has('message_sent'))
<div class="col-lg-6">
    <div class="alert alert-success">{{session('message_sent')}}</div>
</div>
@endif


<div class="row">
    <div class="col-lg-12">
        {!! Form::open([
        'action'=>'BulkSmsController@store',
        'method'=>'POST',
        ]) !!}
        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::label('msg' , 'Create a new message:') !!}
                {!! Form::textarea('msg' , null , ['class'=>'form-control' , 'placeholder'=>'Type message here']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Send SMS' , ['class'=>'btn btn-warning']) !!}
            </div>
        </div>


        {!! Form::close() !!}
    </div>
</div>



<div class="col-lg-12">
    <table class="table table-hover text-capitalize">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Message</th>
                <th scope="col">Sent</th>

            </tr>
        </thead>
        <tbody>
            @php
            $i = 1
            @endphp
            @if($messages)
            @foreach($messages as $message)

            <tr>
                <td>
                    @php
                    echo $i++
                    @endphp
                </td>
                <td>{{$message->msg}}</td>
                <td>{{$message->created_at->diffforhumans()}}</td>


            </tr>

            @endforeach
            @endif
        </tbody>
    </table>

</div>


@endsection
