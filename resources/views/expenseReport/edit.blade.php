@extends('layouts.base')

@section('content')
{{-- content es el mismo nombre que pusimos en base.blade --}}
<div class="row">
    <div class="col">
        <h1>Edit Reports {{ $report->id }}</h1>
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
        <form action="/expense_reports/{{ $report->id }}" method="POST">
            @csrf
            @method('put')
            {{--   @method('put') : para cambiar el post --}}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Type a title" value="{{ $report->title }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>




    </div>
</div>
@endsection
