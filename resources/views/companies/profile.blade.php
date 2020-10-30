@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $company->name}}</h1>
        <div>
            <h3>Biografie</h3>
            <p>{{ $company->bio }}</p>
        </div>
        <div>
            <h3>Projecten</h3>
            <p>{{ $company->projects }}</p>
        </div>
        <div>
            <h3>Locatie</h3>
            <p>{{ $company->location }}</p>
        </div>
        <div>
            <h3>Contact</h3>
            <p>{{ $company->email }}</p>
            <p>{{ $company->phone }}</p>
        </div>

        <div>
            <h3>Dichtstbijzijnde treinstation</h3>
            <p>{{ $getNearestTrainStation[0]->name}}</p>
        </div>
        <div>
            <h3>Aangebode stages</h3>
                <p><a href="cfilter"><p>{{  __('Applications') }}</p></a></p>
            <br>
            @foreach ($company->internships as $internship )
                <a href="/internships/{{$internship->id}}"><p>{{$internship->id}}</p></a>
                <p>{{$internship->bio}}</p>
            @endforeach
        </div>
    </div>
@endsection
