@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Internships</h1>
        @foreach ($internships as $internship)
            <a href="/internships/{{ $internship->id }}/detail"><p>{{ $internship->title}}</p></a>
        @endforeach
    </div>
@endsection