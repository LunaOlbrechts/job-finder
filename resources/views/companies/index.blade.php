@extends('layouts.app')

@section('content')
    <div id="app">
        <h1>Companies</h1>
        <div class="container">
            @foreach ($companies as $company)
                <a href="/companies/{{ $company->id }}"><p>{{ $company->name}}</p></a>
            @endforeach
        </div>
            <h1>{( title )}</h1>
    </div>
@endsection