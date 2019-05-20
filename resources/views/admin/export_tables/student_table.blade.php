<table class="table table-hover text-capitalize">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Course 1</th>
            <th scope="col">Course 2</th>
            <th scope="col">Batch</th>
            <th scope="col">Telephone</th>
            <th scope="col">Regis. No</th>
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
            <td>
                @if($student->course2)
                {{$student->course2->name}}
                @endif
                @if(!$student->course2)
                Null
                @endif
            </td>

            

            <td>{{$student->batch->from}}:00 - {{$student->batch->to}}:00</td>
            <td>{{$student->tel_no}}</td>
            <td>{{$student->reg_no}}</td>
        </tr>
        @endforeach
    </tbody>
</table>