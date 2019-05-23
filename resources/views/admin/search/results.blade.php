@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h5 class="display-4">
            Results
        </h5>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <h5 class="text-success">Total Results: {{count($students)}} students</h5>
    </div>
</div>


<div class="col-lg-12">
    <table class="table table-hover text-capitalize">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Course</th>
                <th scope="col">Batch</th>
                <th scope="col">Telephone</th>
                <th scope="col">Regis. No</th>
                <th scope="col">Action</th>
                <th scope="col" class="text-center">Course 1</th>
                <th scope="col" class="text-center">Course 2</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i = 1
            @endphp
            @foreach($students as $student)
            <tr>
                <td>
                    @php
                    echo $i++
                    @endphp
                </td>
                <td>{{$student->name}}</td>
                <td>{{$student->course->name}}</td>
                <td>{{$student->batch->from}}:00 - {{$student->batch->to}}:00</td>
                <td>{{$student->tel_no}}</td>
                <td>{{$student->reg_no}}</td>
                <td style="display:flex; justify-content:space-evenly">
                    <a href="{{route('students.edit' , $student->slug)}}" class="btn btn-success">Edit</a>

                    <a href="{{route('feemanager.edit' , $student->feemanager_id->slug)}}" class="btn btn-warning">Fee Manager</a>
                </td>
                <td class="text-center text-danger" style="font-weight:bolder">{{Carbon\Carbon::parse($student->date_end)->diffInDays()}} days</td>
                @if($student->date_end_2)
                <td class="text-center text-danger" style="font-weight:bolder">{{Carbon\Carbon::parse($student->date_end_2)->diffInDays()}} days </td>
                @endif
                @if(!$student->date_end_2)
                <td class="text-center text-danger" style="font-weight:bolder">N|A</td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection