@extends('layouts.admin')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css" />
@endsection
@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <a href="{{route('students.index')}}" style="text-decoration:none">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-globe text-warning"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Students Enrolled</p>
                                <p class="card-title">{{$students}}
                                    <p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <a href="{{route('enquiry.index')}}" style="text-decoration:none">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-money-coins text-success"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Enquiries</p>
                                <p class="card-title">{{$enquiries}}
                                    <p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <a href="{{route('course.index')}}" style="text-decoration:none">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-vector text-danger"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Courses</p>
                                <p class="card-title">{{$courses}}
                                    <p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <a href="{{route('docs.index')}}" style="text-decoration:none">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-money-coins text-success"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Certificates Issued</p>
                                <p class="card-title">{{$certificates}}
                                    <p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

</div>
<div class="row">
    <div class="col-md-12">
        <div class="card" style="padding:30px 20px;">
            {!! $calendar->calendar() !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row" style="display:flex; align-items:center">
                    <h5 style="margin-left:10px">Notifications</h5>
                    <h6 style="margin-left:10px">({{now()->toDatestring()}})</h6>
                </div>
                <div class="row" style="margin-left:10px">
                    <table class="table text-uppercase">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Course</th>
                                <th scope="col">View</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1
                            @endphp
                            @foreach($students_comp as $student_comp)
                            <tr>
                                <td>
                                    @php
                                    echo $i++
                                    @endphp
                                </td>
                                <td>{{$student_comp->name}}</td>
                                <td>@if($student_comp->date_end == now()->toDateString())
                                    {{$student_comp->course->name}}
                                    @endif
                                    @if($student_comp->date_end_2 == now()->toDateString())
                                    {{$student_comp->course2->name}}
                                    @endif
                                </td>
                                <td><a href="{{route('students.show' , $student_comp->id)}}" class="btn btn-warning">View</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
{!! $calendar->script() !!}
@stop