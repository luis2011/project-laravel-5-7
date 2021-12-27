{{-- @extends('layouts.base') --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Reports</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a  class="btn btn-primary"href="/expense_reports/create">Create a new report</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table">
             @foreach($expenseReports as $expenseReport)
                 <tr>
                    @if(Auth::user()->id== $expenseReport->idUser)
                        {{$name = Auth::user()->name}}
                        <td><a href="/expense_reports/{{ $expenseReport->id}}" style="text-decoration:none;">{{$expenseReport->title}}</a></td>
                        <td><a href="/expense_reports/{{ $expenseReport->id}}/edit" class="btn btn-primary">Edit</a></td>
                        <td><a href="/expense_reports/{{ $expenseReport->id}}/confirmDelete" class="btn btn-danger">Delete</a></td>
                        <td>{{$name}}</td>
                    @endif


                    </tr>
             @endforeach

            </table>
        </div>
    </div>




        </div>
    </div>
</div>
{{-- content es el mismo nombre que pusimos en base.blade --}}

@endsection
