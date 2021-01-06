@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="page--title-companies">Studenten</h1>

        <div class="cards">
            @foreach($student as $students)
                <div class="card--preview card--preview-padd">
                    <div class="card--imgContainer">
                        <img src="{{ asset('images/avatar.jpg') }}" class="card--logo">
                    </div>
                    <h3 class="card--name"><a href="/students/{{ $students->id}}">{{$students->name}}</a></h3>
                    <p class="card--text">{{$students->preference}}</p>
                    <p class="card--text">{{$students->bio}}</p>
                    <a href="/students/{{ $students->id}}" class="btn--primary btn--primary-sm">Bekijk profiel</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
