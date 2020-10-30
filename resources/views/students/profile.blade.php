@extends('layouts.app')

@section('content')
    <h1>{{ $student->name }}</h1>
    <p>{{ $student->email}}</p>
    <p>{{ $student->age}}</p>
    <p>{{ $student->preference}}</p>
    <p>{{ $student->tools}}</p>
    <p>{{ $student->bio}}</p>
    <p>{{ $student->cv}}</p>

    <h3><a href="/students/{{ $student->id}}/update">Update profile</a></h3>
@endsection