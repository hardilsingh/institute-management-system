<table class="table table-hover text-capitalize">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Regis. No</th>
            <th scope="col">Last Transaction</th>
            <th scope="col">Balance</th>
            <th scope="col">Due date</th>
            <th scope="col">Invoice no.</th>
 <th scope="col">Generated On</th>

        </tr>
    </thead>
    <tbody>
        @php
        $i = 1
        @endphp
        @foreach($list as $reciept)
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
            <td>{{$reciept->number}}</td>
<td>{{$reciept->created_at->toDateString()}}</td>

        </tr>
        @endforeach
    </tbody>
</table>