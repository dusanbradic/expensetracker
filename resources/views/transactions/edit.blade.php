@extends('layouts.main')
@section('content')
<form method="POST" action="{{ route('transactions.update', $transaction) }}">
    @csrf
    @method('PUT')
    <div class="grid grid-cols-2 text-center align-items-center border">
        <div class="col-span-2 border p-5 hover:font-bold px-60">
            <label for="amount" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
            Amount
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" id="amount" name="amount" value="{{ $transaction->amount }}" placeholder="Enter amount" required>
            <!-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> -->
        </div>
        <div class="col-span-2 border p-5 hover:font-bold px-60">
            <label for="category" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >
            Category
            </label>
            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" id="category" name="category" value="{{ $transaction->category }}" placeholder="Enter category" required>
        </div>
        <!-- RADIO BUTTONS      -->

        <h3 class="col-span-2 mb-5 text-lg font-medium text-center text-gray-900 dark:text-white">Transaction type</h3>
        <div class="col-span-2 border p-5 hover:font-bold">
            <input id="income" type="radio" value="1" name="is_income" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" @if($transaction->is_income == 1){{'checked="checked"'}}@endif>
            <label for="income" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Income</label>
        </div>
        <div class="col-span-2 border p-5 hover:font-bold">
            <input id="expense" type="radio" value="0" name="is_income" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" @if($transaction->is_income == 0){{'checked="checked"'}}@endif>
            <label for="expense" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Expense</label>
        </div>
        <div class="col-span-2 border hover:font-bold">
            <button class="p-5" type="submit">Update Transaction</button>
        </div>
    </div>
</form>
@endsection

        <!-- <ul class="grid w-full gap-6 md:grid-cols-2">
            <li>
                <input type="radio" id="income" name="is_income" value="1" class="hidden peer" @if($transaction->is_income == 1){{'checked="checked"'}}@endif>
                <label for="income" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-green-500 peer-checked:border-green-600 peer-checked:text-green-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">                           
                    <div class="block">
                        <div class="w-full text-lg font-semibold">Income</div>
                        <div class="w-full">Good for small websites</div>
                    </div>
                    <svg class="w-5 h-5 ml-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </label>
            </li>
            <li>
                <input type="radio" id="expense" name="is_income" value="0" class="hidden peer" @if($transaction->is_income == 0){{'checked="checked"'}}@endif>
                <label for="expense" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-red-500 peer-checked:border-red-600 peer-checked:text-red-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <div class="block">
                        <div class="w-full text-lg font-semibold">Expense</div>
                        <div class="w-full">Good for large websites</div>
                    </div>
                    <svg class="w-5 h-5 ml-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
               </label>
            </li>
        </ul> -->






<!-- <body>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="POST" action="{{ route('transactions.update', $transaction) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="amount">Amount:</label>
            <input type="text" id="amount" name="amount" value="{{ $transaction->amount }}" placeholder="Enter amount" required>
        </div>

        <div>
            <label for="category">Category:</label>
            <input type="text" id="category" name="category" value="{{ $transaction->category }}" placeholder="Enter category" required>
        </div>

        <div>
            <label>
                <input type="radio" name="is_income" value="0" @if($transaction->is_income == 0){{'checked="checked"'}}@endif> Expense
            </label>
            <label>
                <input type="radio" name="is_income" value="1" @if($transaction->is_income == 1){{'checked="checked"'}}@endif> Income
            </label>
        </div>
        <button type="submit">Update Transaction</button>
        </form>
    </body> -->
