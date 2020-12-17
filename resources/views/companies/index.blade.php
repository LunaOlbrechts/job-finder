@extends('layouts.app')

@section('content')
<div id="app">
    <h1 class="page--title">Companies</h1>
    <div class="container card--list">
        <card-company-component></card-company-component>
    </div>
    <h1>{( title )}</h1>
</div>
@endsection