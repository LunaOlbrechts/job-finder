@extends('layouts.app')

@section('content')
    <div id="app">
        <h1 class="page--title">Companies</h1>
        <div class="container card--list">
            <company-cards-component></company-cards-component>
        </div>
    </div>
@endsection