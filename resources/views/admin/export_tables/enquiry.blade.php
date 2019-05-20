<table class="table table-hover text-capitalize">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Course 1</th>
            <th scope="col">Course 2</th>
            <th scope="col">Address</th>
            <th scope="col">Telephone</th>
            <th scope="col">Follow up</th>
            <th scope="col">Remarks</th>
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
            <td>{{$enquiry->course->name}}</td>
            <td>
                @if($enquiry->course2)
                {{$enquiry->course2->name}}
                @endif
                @if(!$enquiry->course2)
                Null
                @endif
            </td>
            <td>{{$enquiry->address}}</td>
            <td>{{$enquiry->tel_no}}</td>
            <td>{{$enquiry->follow_up}}</td>
            <td>{{$enquiry->remarks}}</td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>