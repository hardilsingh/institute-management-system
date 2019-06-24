<table class="table table-hover text-capitalize">
    <thead class="thead-dark">
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
        @foreach($feelist as $fee)
        <tr>
            <td>
                @php
                echo $i++
                @endphp
            </td>
            <td>{{$fee->student->name}}</td>
            <td>{{$fee->student->reg_no}}</td>
            <td>{{$fee->course->name}}
                @if($fee->course2)
                ,{{$fee->course2->name}}
                @endif
            </td>
            <td>₹ {{$fee->course2 ? $fee->course->fee + $fee->course2->fee : $fee->course->fee}}</td>
            <td>₹ {{$fee->paid_fee}}</td>
            <td>₹{{$fee->balance}}</td>
            <td>{{$fee->due_date}}</td>
        </tr>
        @endforeach
    </tbody>
</table>