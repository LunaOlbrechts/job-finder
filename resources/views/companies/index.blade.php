@extends('layouts.app')

@section('content')
    <h1>Companies</h1>
    <div class="container">
        @foreach ($companies as $company)
            <a href="/companies/{{ $company->id }}"><p>{{ $company->name}}</p></a>
        @endforeach
    </div>

    <div id="app">
        <h1>{{ title }}</h1>

    </div>
@endsection