@extends('layouts.main')
@section('content')
<div class="grid grid-cols-2 text-center align-items-center border">
  <div class="col-span-2 border p-5 hover:font-bold">
    <p>BALANCE</p>
    <p>{{ $total_income - $total_expense }} RSD</p>
  </div>
  <div class="col-span-1 border p-5 hover:font-bold">
    <p >TOTAL INCOME</p>
    <p>{{ $total_income }} RSD</p>
  </div>
  <div class="col-span-1 border p-5 hover:font-bold">
    <p>TOTAL EXPENSE</p>
    <p>{{ $total_expense }} RSD</p>
  </div>
  <div class="col-span-2 border hover:font-bold">
    <button class="p-5"><a href="{{ route('transactions.create') }}">Add transaction</a></button>
  </div>
</div>

<h2>Recent tranasctions</h2>
@if (count($transactions) != 0)
<!-- <p>{{$transactions}}</p> -->


@foreach ($transactions as $transaction)
<div class="col-span-2 border p-2 flex justify-between">
  <div>
    <p>Category:</p>
    <p>{{$transaction->category}}</p>
    <!-- <p>{{$transaction->is_income}}</p> -->
  </div>
  <div>
    <p class="text-red-500">@if ($transaction->is_income == 1){{'+'}}{{ $transaction->amount}}@else{{'-'}}{{ $transaction->amount}}@endif</p>
    <p>{{$transaction->created_at->format('d. M Y')}}</p>
  </div>
  <div>
    <button class="border p-2"><a href="{{ route ('transactions.edit', $transaction) }}" >Edit</a></button>
    <form action="{{ route('transactions.destroy', $transaction) }}" method="post">
      @csrf
      @method('DELETE')
      <button class="border" type="submit" onclick="return confirm('Sure?');">Delete</button>                  
    </form>
  </div>
</div>



@endforeach


    @foreach ($transactions as $transaction)
      <tr>
          <td>@if ($transaction->is_income == 1){{'+'}}{{ $transaction->amount}}@else{{'-'}}{{ $transaction->amount}}@endif</td>
          <td>{{ $transaction->category }}</td>
          <td>@if ($transaction->is_income == 1){{'income'}}@else{{'expense'}}@endif</td>
          <td>{{ $transaction->created_at }}</td>
          <td><button class="border"><a href="{{ route ('transactions.edit', $transaction) }}" >Edit</a></button></td>
          <!-- <td><a href="{{ route ('transactions.destroy', $transaction)}}">Delete</a></td> -->
          <td>
            <form action="{{ route('transactions.destroy', $transaction) }}" method="post">
            @csrf
            @method('DELETE')
            <button class="border" type="submit" onclick="return confirm('Sure?');">Delete</button>                  
            </form>
          </td>
      </tr>
    @endforeach
  </tbody>
</table>  
@else
  <h2><strong>No Transcations Yet!</strong></h2>
@endif
</div>
@endsection