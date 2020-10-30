@extends('layouts.app')

@section('content')
    <h1>Companies</h1>
    <div class="container">
        @foreach ($companies as $company)
            <a href="/companies/{{ $company->id }}"><p>{{ $company->name}}</p></a>
        @endforeach
    </div>
@endsection