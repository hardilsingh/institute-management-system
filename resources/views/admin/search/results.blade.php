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
        <h5 class="text-success">Total Results: {{count($students)}} student(s)</h5>
    </div>
</div>


<div class="col-lg-12">
    <table class="table table-hover text-capitalize">
        <thead class="thead-dark">
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
                <td title="{{$student->course->name}}">{{substr($student->course->name , 0 , 30)}}..</td>
                <td>{{$student->batch->from}}:00 - {{$student->batch->to}}:00</td>
                <td>+91 {{$student->tel_no}}</td>
                <td>{{$student->reg_no}}</td>
                <td>
                    <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
<a href="{{route('students.show' , $student->id)}}" class="btn btn-warning dropdown-item">View</a>
		@if($student->feemanager_id->slug) 

                    <a href="{{route('feemanager.edit' , $student->feemanager_id->slug)}}" class="btn btn-primary dropdown-item">Fee Manager</a>
                @endif

                     {!! Form::model($student , [
                    'action'=>['StudentsController@destroy' , $student->id],
                    'method'=>'DELETE',
                    ]) !!}

                    {!! Form::submit('Delete' , ['class'=>'btn btn-danger dropdown-item']) !!}

                    {!! Form::close() !!} 


      </div>
</div>


                </td>
                <td class="text-center text-danger" style="font-weight:bolder">
                    @if($student->completed_1 == 0)
                    <span style="width:80%; padding:8px 2px; color:white; background-color:black; display:block">
{{Carbon\Carbon::parse($student->date_end)->diffInDays()}} days
</span>

                    @endif
                    @if($student->completed_1 == 1)
                    <span style="font-weight:bold; color:green; font-size:22px"><i class="fas fa-check-circle"></i></span>
                    @endif

                </td>

                @if($student->date_end_2)
                <td class="text-center text-danger" style="font-weight:bolder">
                    @if($student->completed_2 == 0)
                    <span style="width:80%; padding:8px 2px; color:white; background-color:black; display:block">
{{Carbon\Carbon::parse($student->date_end_2)->diffInDays()}} days
</span>

                    @endif
                    @if($student->completed_2 == 1)
                    <span style="font-weight:bold; color:green; font-size:22px"><i class="fas fa-check-circle"></i></span>
                    @endif
                </td>
                @endif
                @if(!$student->date_end_2)
                <td class="text-center text-danger" style="font-weight:bolder"><i class="fas fa-times"></i></td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection