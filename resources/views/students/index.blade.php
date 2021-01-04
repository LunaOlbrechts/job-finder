@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>All students</h1>

        @foreach($student as $students)
            <h3><a href="/students/{{ $students->id}}">{{$students->name}}</a></h3>
        @endforeach
    </div>
@endsection
