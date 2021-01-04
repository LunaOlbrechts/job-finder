@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="page--title">Internships</h1>
        <div class="cards">
            @foreach ($internships as $internship)
                <div class="card--preview">
                    @if($internship->created_at > $lastWeek )
                    <div class="card--badge">Nieuw</div>                    
                    @endif
                    <div class="card--imgContainer">
                        <img src="{{ $internship->company->logo}}" class="card--logo">
                    </div>
                    <a href="/internships/{{ $internship->id }}/detail" class="card--name"><p>{{ $internship->title}}</p></a>
                    <p class="card--text">{{ $internship->type }}</p>
                    <div class="card--button">
                        <a href="/internships/{{ $internship->id }}/detail">></a>
                    </div>
                </div>
            @endforeach
        </div>
       <a href="/internships/create/{{ $internship->company_id }}"><p>create</p></a>
    </div>
@endsection