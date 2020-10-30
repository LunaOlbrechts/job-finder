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

        <h1>Nearest train station</h1>
        @if(count($getNearestTrainStation))
            <p>{{ $getNearestTrainStation[0]->name}}</p>
        @else
            <p>No stations found</p>
        @endif
    

        <h1>Internships</h1>
        <p><a href="/companies/{{$company->id}}/filter"><h1>{{  __('Applications') }}</h1></a></p>
        <br>

        @foreach ($company->internships as $internship )
            <a href="/internships/{{$internship->id}}"><h1>{{$internship->id}}</h1></a>
            <p>{{$internship->bio}}</p>
        @endforeach
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
>>>>>>> 3d8e7298c07f41dfe41e610f22818c4a9317edb6
    </div>
@endsection
