@extends('layouts.main')
@section('content')
<!-- @if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif -->

<form method="POST" action="{{ route('transactions.store')}}">
    @csrf
    <div class="grid grid-cols-2 text-center align-items-center border">
        <div class="col-span-2 border p-5 hover:font-bold px-60">
            <label for="amount" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
            Amount
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" id="amount" name="amount" placeholder="Enter amount" required>
            @if ($errors->has('amount'))
            <span class="text-red-500">{{$error}}</span>
            @endif
            <!-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> -->
        </div>
        <div class="col-span-2 border p-5 hover:font-bold px-60">
            <label for="category" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >
            Category
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" id="category" name="category" placeholder="Enter category" required>
            @if ($errors->has('category'))
            <div>{{$error}}</div>
            @endif
        </div> 
        <!-- RADIO BUTTONS      -->

        <h3 class="col-span-2 mb-5 text-lg font-medium text-center text-gray-900 dark:text-white">Transaction type</h3>
        <div class="col-span-2 border p-5 hover:font-bold">
            <input id="income" type="radio" value="1" name="is_income" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">            <label for="income" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Income</label>
        </div>
        <div class="col-span-2 border p-5 hover:font-bold">
            <input id="expense" type="radio" value="0" name="is_income" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="expense" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Expense</label>
        </div>
        <div class="col-span-2 border hover:font-bold">
            <button class="p-5" type="submit">Add Transaction</button>
        </div>
    </div>

</form>
@endsection