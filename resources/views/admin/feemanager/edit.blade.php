@extends('layouts.admin')
@section('content')

<h5 class="display-4">
    Fee Manager
</h5>
@include('includes.errors')

{!! Form::model($student , [

'action'=>['FeeManagerController@update' , $student->id],
'method'=>'PATCH'

]) !!}

{{csrf_field()}}



<div class="col-lg-12">
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
                        <td>{{$student->student->name}}</td>
                    </tr>
                    <tr>
                        <td>Reg No:</td>
                        <td>{{$student->student->reg_no}}</td>
                    </tr>
                    <tr>
                        <td>Course:</td>
                        <td>{{$student->course->name}}</td>
                    </tr>
                    <tr>
                        <td>Course Fee:</td>
                        <td>₹ {{$student->course->fee}}</td>
                    </tr>
                   
                    <tr>
                        <td>Discount:</td>
                        <td>₹ {{$student->discount}}</td>
                    </tr>
                    <tr>
                        <td>Last Transaction:</td>
                        <td>₹ {{$student->paid_fee}}</td>
                    </tr>
                    <tr>
                        <td>Balance:</td>
                        <td>₹ {{$student->balance}}</td>
                    </tr>
                    <tr>
                        <td>Due date:</td>
                        <td>{{$student->due_date}}</td>
                    </tr>
                    
                    <tr>
                        <td style="font-weight:bold; ">Total Fee:</td>
                        <td style="font-weight:bold">₹ {{$student->discounted_fee}}</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
        @if($student->balance !== 0) 
        <div class="col-lg-4" style="margin-left:100px">

            <input type="hidden" name="total_fee" value = "{{$student->course->fee}}">
            <input type="hidden" name="balance" value="{{$student->balance}}">
            <input type="hidden" name="discounted_fee" value="{{$student->discounted_fee}}">
 
            <div class="form-group">
                {!! Form::label('total_fee' , 'Total Fee:') !!}
                {{Form::number('total_fee' , $student->course->fee , ['class'=>'form-control' , 'disabled'])}}
            </div>

            <div class="form-group">
                {!! Form::label('discount' , 'Discount:') !!}
                {{Form::number('discount' , null  , ['class'=>'form-control'])}}
            </div>

            
            <div class="form-group">
                {!! Form::label('paid_fee' , 'Fee Paid:') !!}
                {!! Form::number('paid_fee' , 0 , ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('due_date' , 'Due Date:') !!}
                {!! Form::date('due_date' , 0 ,['class'=>'form-control' , 'id'=>'datepicker']) !!}
            </div>

            <div class="form-group">
                {!!Form::submit('Save' , ['class'=>'btn btn-success btn-lg'])!!}
            </div>
        </div>
        @endif
        
        @if($student->balance == 0 && $student->balance !== null) 
        <div class="col-lg-7  text-center">
            <h4 class="text-success display-4 ">Dues cleared</h4>
        </div>
        @endif

    </div>



</div>



{!! Form::close() !!}
@endsection