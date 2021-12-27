@extends('layouts.base')

@section('content')
{{-- content es el mismo nombre que pusimos en base.blade --}}
<div class="row">
    <div class="col">
        <h1>Send Reports</h1>
    </div>
</div>
<div class="row">
    <div class="col">
        <a  class="btn btn-secondary" href="/expense_reports">Back</a>
    </div>
</div>

<div class="row">
    <div class="col">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/expense_reports/{{ $report->id }}/sendMail" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Type a email" value="{{old('email')}}">
            </div>
            <button type="submit" class="btn btn-primary">Send mail</button>
        </form>
    </div>
</div>




    </div>
</div>
@endsection
