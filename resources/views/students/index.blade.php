@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>All students</h1>
        @foreach($students as $student)
            <h3><a href="/students/{{ $student->id}}">{{$student->name}}</a></h3>
        @endforeach
    </div>
@endsection
