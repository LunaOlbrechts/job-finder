@extends('layouts.app')

@section('content')
<div id="app">
    <h1 class="page--title">Companies</h1>
    <div class="container card--list">
        @foreach ($companies as $company)
        <div class="company--card-preview">
            <div class="company--card-imgContainer">
                <img class="company--card-logo" src="{{ $company->logo }}">
            </div>
            <a class="company--card-title" href="/companies/{{ $company->id }}">
                <h3 class="company--card-name">{{ $company->name}}</h3>
            </a>
            <p class="company--card-text">{{ $company->bio }}</p>
            <div class="company--card-button">
                >
            </div>
        </div>
        @endforeach
    </div>
    <h1>{( title )}</h1>
</div>
@endsection