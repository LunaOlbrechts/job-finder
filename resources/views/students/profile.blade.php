@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <button type="button" class="btn btn-outline-info btn-lg"><a class="card-link"href="/students/{{ $student->id}}/update">Update profile</a></button>

    <h1>{{ $student->name }}</h1>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Email: {{ $student->email}}</li>
        <li class="list-group-item">Leeftijd: {{ $student->age}}</li>
        <li class="list-group-item">Preference: {{ $student->preference}}</li>
        <li class="list-group-item">Tools: {{ $student->tools}}</li>
        <li class="list-group-item">Bio: {{ $student->bio}}</li>
        <li class="list-group-item">Portfolio: <a href="{{ $student->portfolio}}" target="_blank">{{ $student->portfolio}}</a></li>
        <li class="list-group-item">Linkedin:  <a href=" {{ $student->linkedin}}" target="_blank"> {{ $student->linkedin}}</a></li>
    </ul>


    <h3>Application phases</h3>
    @foreach($applications as $application)
    <h4>{{ $application->internship->title}}</h4>
    <p>{{ $application->applicationFase->title}}</p>
    @endforeach

   

    <div id="app">
        <h3>Dribbble portfolio</h3>
            <dribbble-shot-component></dribbble-shot-component>
    </div>
</div>


@endsection