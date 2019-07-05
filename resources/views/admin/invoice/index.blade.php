@extends('layouts.admin')
@section('content')

<div class="row" style="margin-bottom:30px">
    <div class="col-lg-6">
        <h5 class="display-4">
            Reciepts
        </h5>
    </div>
</div>

@if(Session::has('updates'))
<div class="col-lg-6">
    <div class="alert alert-success">{{session('updates')}}</div>

</div>
@endif

<div class="row" style="margin-bottom:50px;">
    <div class="col-lg-12">
        @if(count($reciepts))
        <div class="col-lg-2" style="margin-bottom:50px">
            <a href="/invoice/downloadExcel" class="btn btn-primary btn-lg">Export excel file</a>
        </div>
        @endif
        @if(!count($reciepts))
        <div class="col-lg-2" style="margin-bottom:50px">
            <a href="/invoice/downloadExcel" class="btn btn-primary btn-lg" disabled>Export excel file</a>
        </div>
        @endif
    </div>
</div>


<div class="col-lg-12">
    <table class="table table-hover text-capitalize">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Regis. No</th>
                <th scope="col">Last Transaction</th>
                <th scope="col">Balance</th>
                <th scope="col">Due date</th>
<th scope="col">Generated on</th>
                <th scope="col">Invoice no.</th>

<th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i = 1
            @endphp
            @foreach($reciepts as $reciept)
            <tr>
                <td>
                    @php
                    echo $i++
                    @endphp
                </td>
                <td>{{$reciept->student->name}}</td>
                <td>{{$reciept->student->reg_no}}</td>
                <td>₹ {{$reciept->paid_fee}}</td>
                <td>₹{{$reciept->balance}}</td>
                <td>{{$reciept->due_date}}</td>
<td>{{$reciept->created_at->toDateString()}}</td>
{!! Form::model($reciept , [

                'method'=>'PATCH',
                'action'=>['RecieptController@update' , $reciept->id]

                ]) !!}
                <td>
                    {!! Form::number('number' , $reciept->number , ['class'=>'form-control' , 'placeholder'=>'Enter Reciept Number' , 'style'=>'width:50%']) !!}
                </td>

                <td>
                    {!! Form::submit('Update' , ['class'=>'btn btn-warning' , 'onclick'=>'return confirm("Are you sure you want to update?")']) !!}
 
                {!! Form::close() !!}
<a href="/reciept/{{$reciept->id}}" target="_blank" class="btn btn-success">View</a>
</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            {{$reciepts->render()}}
        </ul>
    </nav>
</div>

@endsection