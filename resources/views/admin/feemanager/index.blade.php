@extends('layouts.admin')
@section('content')

<div class="row" style="margin-bottom:50px">
    <div class="col-lg-12">
        <h5 class="display-4">
            Student Fee Manager
        </h5>
    </div>
</div>

@if(Session::has('fee_updated'))
<div class="row">
    <div class="col-lg-5">
        <div class="alert alert-success">{{ session('fee_updated') }}</div>
    </div>
</div>
@endif

<div class="col-lg-12">
    <table class="table table-hover text-capitalize">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Regis. No</th>
                <th scope="col">Course</th>
                <th scope="col">Course Fee</th>
                <th scope="col">Last Transaction</th>
                <th scope="col">Balance</th>
                <th scope="col">Due date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i = 1
            @endphp
            @foreach($fees as $fee)
            <tr>
                <td>
                    @php
                    echo $i++
                    @endphp
                </td>
                <td>{{$fee->student->name}}</td>
                <td>{{$fee->student->reg_no}}</td>
                <td>{{$fee->course->name}}</td>
                <td>₹ {{$fee->course->fee}}</td>
                <td>₹ {{$fee->paid_fee}}</td>
                <td>
                    @if($fee->balance == 0)
                    Nill
                    @endif
                    @if($fee->balance !== 0 )
                    ₹ {{$fee->balance}}
                    @endif
                </td>
                <td>{{$fee->due_date}}</td>
                <td style="display:flex; justify-content:space-evenly">
                    <a href="{{route('feemanager.edit' , $fee->slug)}}" class="btn btn-success">Manage</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            {{$fees->render()}}
        </ul>
    </nav>
</div>








@endsection