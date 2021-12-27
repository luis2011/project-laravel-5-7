<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request){
        //var_dump($request->query('title', 'valor default')); // dd = var_dump
        return view('dashboard' , [
            'title' => $request->query('title', 'texto default')
        ]);
    }
}
