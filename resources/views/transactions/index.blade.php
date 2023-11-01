@extends('layouts.main')
@section('content')
<div class="grid grid-cols-2 text-center align-items-center border">
  <div class="col-span-2 border p-5 hover:font-bold">
    <p>BALANCE</p>
    <p>{{ $balance }} RSD</p>
  </div>
  <div class="col-span-1 border p-5 hover:font-bold">
    <a href="{{ route('transactions.show_income') }}">
      <p >TOTAL INCOME</p>
      <p>{{ $total_income }} RSD</p>
    </a>
  </div>
  <div class="col-span-1 border p-5 hover:font-bold">
    <a href="{{ route('transactions.show_expense') }}">
      <p>TOTAL EXPENSE</p>
      <p>{{ $total_expense }} RSD</p>
    </a>  
  </div>
  <div class="col-span-2 border hover:font-bold">
    <button class="p-5"><a href="{{ route('transactions.create') }}">Add transaction</a></button>
  </div>
</div>

<div class="grid grid-cols-1">
@if (!empty($transactions))
<!-- <p>{{$transactions}}</p> -->


<h2>Recent tranasctions</h2>

<label>Start Date:</label>
<input type="date" placeholder=" "name="date" id="date">

<label>End Date:</label>
<input type="date" name="date" id="date">

<table class="table-auto border text-center">
  <thead>
    <tr>
      <th scope="col">Amount</th>
      <th scope="col">Category</th>
      <th scope="col">Income/Expense</th>
      <th scope="col">Created at</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($transactions as $transaction)
      <tr>
          <td>@if ($transaction->is_income == 1){{'+'}}{{ $transaction->amount}}@else{{'-'}}{{ $transaction->amount}}@endif</td>
          <td>{{ $transaction->category }}</td>
          @if ($transaction->is_income == 1)
            <td class="rounded-md bg-green-50 px-2 py-1 text-green-700 ring-1 ring-inset ring-green-600/20">
              income
            </td>
          @else
            <td class="rounded-md bg-red-50 px-2 py-1 text-red-700 ring-1 ring-inset ring-red-600/10">
              expense
            </td>
          @endif
          <!-- <td >@if ($transaction->is_income == 1){{'income'}}@else{{'expense'}}@endif</td> -->
          <td>{{ $transaction->created_at->format('d. M Y') }}</td>
          <!-- <td><button class="border"><a href="{{ route ('transactions.edit', $transaction) }}" >Edit</a></button></td> -->

          <td class="flex justify-center">
            <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 mr-3 border border-blue-500 hover:border-transparent rounded">
              <a href="{{ route ('transactions.edit', $transaction) }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>
              </a>
            </button>
            <form action="{{ route('transactions.destroy', $transaction) }}" method="post">
              @csrf
              @method('DELETE')
              <button class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded" type="submit" onclick="return confirm('Sure?');">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg>
              </button>                  
            </form>
          </td>
          
          <!-- <td>
            <form action="{{ route('transactions.destroy', $transaction) }}" method="post">
              @csrf
              @method('DELETE')
              <button class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded" type="submit" onclick="return confirm('Sure?');">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg>
              </button>                  
            </form>
          </td> -->
      </tr>
    @endforeach
  </tbody>
</table>  
@else
  <h2 class="text-center m-2"><strong>No Transcations Yet!</strong></h2>
@endif
</div>
@endsection




<!-- top part worse try-->
<!-- 
<div class="grid grid-cols-1 text-center">
  <div class="columnn-1 border">
    <p  class="p-2">BALANCE </p>
    <p class="p-2">{{ $total_income - $total_expense }} RSD</p>
  </div>
</div>
<div class="grid grid-cols-2 text-center">
  <div class="column-1 border ">
    <h3 class="p-2">TOTAL INCOME</h3>
    <span class="p-2">{{ $total_income }} RSD</span>
  </div>
  <div class="column-1 border">
    <h3 class="p-2">TOTAL EXPENSE</h3>
    <span class="p-2">{{ $total_expense }} RSD</span>
  </div>
</div>
<div class="grid grid-cols-1">
  <button class="border p-5"><a href="{{ route('transactions.create') }}">Add transaction</a></button>
</div>
 -->




                 <!-- <span style="display: inline-flex; align-items: center;">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m0 0l6.75-6.75M12 19.5l-6.75-6.75" />
                  </svg>
                  Edit
                </span> -->