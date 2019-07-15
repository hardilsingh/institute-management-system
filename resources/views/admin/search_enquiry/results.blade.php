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
        <h5 class="text-success">Total Results: {{count($enquiries)}} enquirie(s)</h5>
    </div>
</div>


<div class="col-lg-12">
    <table class="table table-hover text-capitalize">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Course</th>
                <th scope="col">Address</th>
                <th scope="col">Telephone</th>
                <th scope="col">Follow up</th>
                <th scope="col">Remarks</th>
                <th scope="col">View</th>
            </tr>
        </thead>
        <tbody>
            @if(count($enquiries) > 0)
            @php
            $i = 1
            @endphp
            @foreach($enquiries as $enquiry)
<tr>
                <td>
                    @php
                    echo $i++
                    @endphp
                </td>
                <td>{{$enquiry->name}}</td>
                <td>
                    @if($enquiry->course)
                    {{$enquiry->course->name}}
                    @endif
                    @if($enquiry->course2)
                    , {{$enquiry->course2->name}}
                    @endif
                </td>
                <td>+91 {{$enquiry->tel_no}}</td>
                <td>{{$enquiry->follow_up}}</td>
                <td>{{substr($enquiry->remarks , 0 , 30)}}</td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a href="{{route('enquiry.edit' , $enquiry->slug)}}" class="btn btn-success dropdown-item">View</a>
                            {!! Form::model($enquiry, [
                            'action'=>['EnquiriesController@destroy' , $enquiry->id],
                            'method'=>'DELETE',

                            ]) !!}
                            <input type="submit" value="Delete" class="btn btn-danger dropdown-item" onclick="return confirm('Are you sure you want to delete?')">
                            {!! Form::close() !!}
                            @if($enquiry->enrolled !== 1 )
                            {!! Form::model($enquiry , [
                            'method'=>'POST',
                            'action'=>'EnrollmentContoller@store'
                            ]) !!}
                            <input type="hidden" name="name" value="{{$enquiry->name}}">
                            <input type="hidden" name="id" value="{{$enquiry->id}}">
                            <input type="hidden" name="father_name" value="{{$enquiry->father_name}}">
                            <input type="hidden" name="tel_no" value="{{$enquiry->tel_no}}">
                            <input type="hidden" name="gender" value="{{$enquiry->gender}}">
                            <input type="hidden" name="email" value="{{$enquiry->email}}">
                            <input type="hidden" name="edu" value="{{$enquiry->edu}}">
                            <input type="hidden" name="address" value="{{$enquiry->address}}">
                            <input type="hidden" name="school_name" value="{{$enquiry->school_name}}">
                            <input type="hidden" name="batch_id" value="{{$enquiry->batch_id}}">
                            <input type="hidden" name="course_id" value="{{$enquiry->course_id}}">
                            <input type="hidden" name="course_id_2" value="{{$enquiry->course_id_2}}">
                            <input type="hidden" name="date_join" value="{{now()->toDateString()}}">
                            <input type="hidden" name="date_join_2" value="{{now()->toDateString()}}">
                        </div>
                    </div>
                </td>
                @if($enquiry->enrolled == 0)
                <td class="text-center">

                    {!! Form::submit('Enroll' , ['class'=>'btn btn-warning' , 'onclick'=>'return confirm("Are you sure you want to enroll?")']) !!}
                    @endif
                    {!! Form::close() !!}

                </td>
                @endif
                @if($enquiry->enrolled == 1 )
                <td>

                    <p class="text-center" style="font-size:22px; color:green"><i class="fas fa-check-circle"></i></p>

                </td>
                @endif 
           </tr>
            

            @endforeach
            @endif
        </tbody>
    </table>
<nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            
        </ul>
    </nav>

    </div>








@endsection