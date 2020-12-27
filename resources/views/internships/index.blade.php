@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Internships</h1>
        <div class="cards">
            @foreach ($internships as $internship)
                <div class="card--preview">
                    <div class="card--imgContainer">
                        <img src="{{ $internship->company->logo}}" class="card--logo">
                    </div>
                    <a href="/internships/{{ $internship->id }}/detail"><p>{{ $internship->title}}</p></a>
                    <div class="card--button">
                        <a href="/internships/$internship->id/details">></a>
                    </div>
                </div>
            @endforeach
        </div>
       <a href="/internships/create/{{ $internship->company_id }}"><p>create</p></a>
    </div>
@endsection