@extends('layouts.app')

@section('content')
<br><br><br>
<div class="container-page">
    <button type="button" class="btn btn-outline-info btn-lg"><a class="card-link"href="/students/{{ $student->id}}/update">Update profile</a></button>
    <br><br>
    <div class="page--title-companies">
        <img src="{{ asset('images/avatar.jpg') }}" class="img--profile">
        <h1 class="list--name">{{ $student->name }}</h1>
    </div>
    <div class="container container-profile">
        <h3>Gegevens</h3>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Email: {{ $student->email}}</li>
            <li class="list-group-item">Leeftijd: {{ $student->age}}</li>
            <li class="list-group-item">Preference: {{ $student->preference}}</li>
            <li class="list-group-item">Tools: {{ $student->tools}}</li>
            <li class="list-group-item">Bio: {{ $student->bio}}</li>
            <li class="list-group-item">Portfolio: <a href="{{ $student->portfolio}}" target="_blank">{{ $student->portfolio}}</a></li>
            <li class="list-group-item">Linkedin:  <a href=" {{ $student->linkedin}}" target="_blank"> {{ $student->linkedin}}</a></li>
        </ul>

        @if(Auth::guard('web')->user() && Auth::guard('web')->user()->id == $student->id)
            <h3>Stage solicitatie fases</h3>
            @foreach($applications as $application)
                <h4>{{ $application->internship->title}}</h4>
                <p>{{ $application->applicationFase->title}}</p>
            @endforeach
            @if(empty($applications))
                <p>Je hebt nog geen solicitaties</p>
            @endif
        @endif

        <div id="app" class="container-profile">
            <h3>Dribbble portfolio</h3>
                <dribbble-shot-component></dribbble-shot-component>
        </div>
    </div>
</div>


@endsection
