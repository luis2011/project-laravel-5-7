<?php

namespace App\Http\Controllers;

use App\User;
use App\Mail\SummaryReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\ExpenseReport; // agregar el modelo

class ExpenseReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // con esto protejo la ruta
    }


    public function index()
    {
        return view('expenseReport.index', [
        'expenseReports' =>ExpenseReport::all(), // regreso todos los datos de la tabla ExpenseReport
    ]);
    }


    public function create()
    {

        return view('expenseReport.create');
    }


    public function store(Request $request)
    {

        // valida el campo title y lo hace requerido
        $validData = $request->validate([
            'title' =>'required | min:3'
        ]);



        $report = new ExpenseReport();
        $report->title = $validData['title'];
        $report->idUser =  Auth::user()->id;
        $report->save();


        return redirect('/expense_reports');

    }


    public function show(ExpenseReport $expenseReport)
    {

        return view('expenseReport.show', [
            'report' => $expenseReport
     ]);
    }


    public function edit($id)
    {
        //findOrFail : regresa un 404 de forma automatica
        $report = ExpenseReport::findOrFail($id);
        return view('expenseReport.edit', [
               'report' => $report
        ]); // carpeta y vista
    }


    public function update(Request $request, $id)
    {

        $validData = $request->validate([
            'title' =>'required | min:3'
        ]);

        $report = ExpenseReport::findOrFail($id);
        $report->title= $validData['title'];
        $report->save();

        return redirect('/expense_reports');
    }


    public function destroy($id)
    {
        $report = ExpenseReport::findOrFail($id);
        $report->delete();

        return redirect('/expense_reports');
    }

    public function confirmDelete($id)
    {
        //dd('confirmDelete' . $id);
        $report = ExpenseReport::find($id);
        return view('expenseReport.confirmDelete', [
            'report' => $report
        ]);

    }

    public function confirmSendMail($id){
        $report = ExpenseReport::findOrFail($id);
        return view('expenseReport.confirmSendMail', [
            'report' => $report
        ]);
    }

    public function sendMail(Request $request, $id){
        $report = ExpenseReport::findOrFail($id);
        Mail::to($request->get('email'))->send(new SummaryReport($report));
        return redirect('/expense_reports/'. $id);
    }

}
