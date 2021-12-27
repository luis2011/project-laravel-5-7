<?php

namespace App\Http\Controllers;

use App\Expense;
use App\ExpenseReport;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth'); // con esto protejo la ruta
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ExpenseReport $expenseReport)
    {
        return view ('expense.create' , [
            'report' => $expenseReport
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , ExpenseReport $expenseReport)
    {

        $validData = $request->validate([
            'description' =>'required | min:3',
            'amount' => "required|regex:/^\d+(\.\d{1,2})?$/"

        ]);

        $expense = new Expense();
        $expense->description = $validData['description'];
        $expense->amount = $request->get('amount');
        $expense->expense_report_id = $expenseReport->id;
        $expense->save();

        return redirect('/expense_reports/'.$expenseReport->id);
        //dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
