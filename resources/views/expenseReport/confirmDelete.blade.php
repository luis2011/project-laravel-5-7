@extends('layouts.base')

@section('content')
{{-- content es el mismo nombre que pusimos en base.blade --}}
<div class="row">
    <div class="col">
        <h1>Delete Reports {{ $report->id }}</h1>
    </div>
</div>
<div class="row">
    <div class="col">
        <a  class="btn btn-secondary" href="/expense_reports">Back</a>
    </div>
</div>

<div class="row">
    <div class="col">
        <form action="/expense_reports/{{ $report->id }}" method="POST">
            @csrf
            @method('delete')
            {{--   @method('put') : para cambiar el post --}}
           <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
</div>




    </div>
</div>
@endsection
