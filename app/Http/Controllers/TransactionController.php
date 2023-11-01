<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::all()->sortByDesc('created_at');
        $total_income = Transaction::where('is_income', 1)->sum('amount');
        $total_expense = Transaction::where('is_income', 0)->sum('amount');
        $balance = floatval($total_income - $total_expense);

        return view('transactions.index', compact('transactions', 'total_income', 'total_expense', 'balance'));
    }

    public function filter(Request $request){
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $transactions = Transaction::whereDate('created_at', '>=', $start_date)
        ->whereDate('created_at', '<=', $end_date)->get();

        // $transactions = Transaction::all()->sortByDesc('created_at');
        $total_income = Transaction::where('is_income', 1)->sum('amount');
        $total_expense = Transaction::where('is_income', 0)->sum('amount');
        $balance = floatval($total_income - $total_expense);
        return view('transactions.index', compact('transactions', 'total_income','total_expense','balance'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = array(
            'amount' => 'required|numeric',
            'category' => 'required|string',
            'is_income' => 'required|in:1,0'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('transactions/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            Transaction::create($validator->validated());
            // Session::flash('message', 'Transaction succesfully added');
            return Redirect::to('/')->with('success', 'Transaction succesfully added');
        }
    }

    /**
     * Display all expenses.
     */
    public function show_expense()
    {
        $expense_transactions = Transaction::where('is_income', 0)->get();
        return view('transactions/expense', compact('expense_transactions'));
    }

    public function show_income()
    {
        $income_transactions = Transaction::where('is_income', 1)->get();
        return view('transactions/income', compact('income_transactions'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', compact('transaction'));
    }
    /**
     * Update the specified resource in storage.
     */
     public function update(Request $request, Transaction $transaction)
    {
        //fix this one  
        $rules = array(
            'amount' => 'required|numeric',
            'category' => 'required|string',
            'is_income' => 'required|in:1,0'
        );
        
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to(route('transactions.edit', $transaction))#ovde sam
                ->withErrors($validator)
                ->withInput();
        } else {
            $transaction->update($validator->validated());
            return Redirect::to('/')->with('success', "Transaction successfuly updated");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //do this function in the model
        $transaction->delete();
        return Redirect::to('/')->with('success', 'Transaction deleted successfully');
        // return redirect()->back();
    }
}
