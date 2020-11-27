@extends('layouts.app')

@section('content')
    <h1>{{ $student->name }}</h1>
    <p>{{ $student->email}}</p>
    <p>{{ $student->age}}</p>
    <p>{{ $student->preference}}</p>
    <p>{{ $student->tools}}</p>
    <p>{{ $student->bio}}</p>
    <p>{{ $student->cv}}</p>

    <h3>Application phases</h3>
    @foreach($applications as $application)
    <h4>{{ $application->internship->title}}</h4>
    <p>{{ $application->applicationFase->title}}</p>
    @endforeach

    <h3><a href="/students/{{ $student->id}}/update">Update profile</a></h3>
@endsection