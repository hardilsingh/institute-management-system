@extends('layouts.admin')

@section('content')

@include('includes.errors')


<!-- information -->
<div class="col-lg-12">
    <div class="row">
        <div class="col-lg-12">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title">{{$student->name}}</h5>
                    <table class="table text-capitalize">
                        <tbody>
                            <tr>
                                <td>Course 1:</td>
                                <td>{{$student->course->name}}
                                    <span style="margin-left:80px; font-weight:bolder; color:darkred; font-size:20px">
                                        @if($student->completed_1 == 1)
                                        Completed
                                        @endif

                                        @if($student->completed_1 !== 1)
                                        {{Carbon\Carbon::parse($student->date_end)->diffInDays()}} days remaining!

                                        @endif

                                    </span>

                                </td>
                            </tr>
                            <tr>
                                <td>Course 2:</td>
                                <td>
                                    @if($student->course2)
                                    {{$student->course2->name}}
                                    @endif
                                    @if(!$student->course2)
                                    Not Enrolled
                                    @endif
                                    <span style="margin-left:80px; font-weight:bolder; color:darkred; font-size:20px">
                                        @if($student->completed_2 == 1)
                                        Completed
                                        @endif

                                        @if($student->completed_2 !== 1)
                                        @if($student->date_end_2)
                                        {{Carbon\Carbon::parse($student->date_end_2)->diffInDays()}} days remaining!
                                        @endif
                                        @if(!$student->date_end_2)
                                        N|A
                                        @endif
                                        @endif

                                    </span>

                                </td>
                            </tr>
                            <tr>
                                <td>Father Name:</td>
                                <td>{{$student->father_name}}</td>
                            </tr>
                            <tr>
                                <td>address:</td>
                                <td>{{$student->address}}</td>
                            </tr>
                            <tr>
                                <td>Mobile:</td>
                                <td>{{$student->tel_no}}</td>
                            </tr>
                            <tr>
                                <td>Date Of admission:</td>
                                <td>{{$student->date_join}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    @if($student->completed_1 !== 1 || $student->completed_2 !== 1)
                    <a href="{{route('students.edit' , $student->slug)}}"  class="btn btn-primary">Edit</a>
                    @endif
                    @if($student->completed_1 == 1 && $student->completed_2 == 1)
                    <a href="{{route('students.edit' , $student->slug)}}" disabled class="btn btn-primary">Edit</a>
                    @endif
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
                    <h5>Books</h5>


                    @if(Session::has('book_issued'))
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="alert alert-success">{{ session('book_issued') }}</div>
                        </div>
                    </div>
                    @endif


                    {!! Form::open([
                    'action'=>'StudentsController@store',
                    'method'=>'POST'
                    ]) !!}

                    {!! csrf_field() !!}

                    <div class="form-group">
                        {!! Form::label('book_id' , 'Book Name' , []) !!}
                        {!! Form::select('book_id' , $books , '' , ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('code' , 'Book Code' , []) !!}
                        {!! Form::number('code' , null , ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Issue book' , ['class'=>'btn btn-success']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::hidden('enrollment_id' , $student->id , []) !!}
                    </div>

                    {!! Form::close() !!}


                    <table class="table text-capitalize">
                        <thead class="thead-dark">
                            <tr>
                                <th>Book Name</th>
                                <th>Book code</th>
                                <th>Issue Date</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach($issued_books as $book)
                            <tr>
                                <td>
                                    @if($book->books)
                                    {{$book->books->name}}
                                    @endif
                                </td>
                                <td>
                                    {{$book->code}}
                                </td>
                                <td>
                                    {{$book->created_at->toDateString()}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- payment History -->
<div class="col-lg-12">
    <div class="row">
        <div class="col-lg-12">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <h5>Payment History</h5>



                    <table class="table text-capitalize">
                        <thead class="thead-dark">
                            <tr>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Payment of</th>
                                <th>Reciept</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reciepts as $reciept)
                            <tr>
                                <td>{{$reciept->student->name}}</td>
                                <td>{{$reciept->created_at->toDateString()}}</td>
                                <td>₹ {{$reciept->paid_fee}}</td>
                                <td>
                                    <a href="/reciept/{{$reciept->id}}" target="_blank" class="btn btn-primary">Reciept</a>
                                </td>
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