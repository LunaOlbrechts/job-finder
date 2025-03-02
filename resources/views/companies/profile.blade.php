@extends('layouts.app')

@section('content')

    <div class="list">
        <br><br><br><br>
        <div class="list--logo">
            <img src=" {{$company->logo }}">
        </div>
        <h1 class="list--name">{{ $company->name}}</h1>

        @if(Auth::guard('company')->user() && Auth::guard('company')->user()->id == $company->id)
            <button type="button" class="btn btn-primary btn--primary-gold"><a href="/companies/{{ $company->id}}/update">Update profile</a></button>
        @endif
        <div>
            <h4>Biografie</h4>
            <p>{{ $company->bio }}</p>
        </div>
        <div class="list--background">
            <div>
                <h4>Projecten</h4>
                <p>{{ $company->projects }}</p>
            </div>
        </div>
        <div>
            <h4>Internships</h4>
            <!-- <p><a href="/companies/{{$company->id}}/applications"><h5>{{  __('Applications') }}</h5></a></p> -->
            <div class="company--internschips-container">
                @forelse ($company->internships as $internship )
                    <div class="company--profile-internschips">
                        <a href="/internships/{{$internship->id}}/detail"><h4>{{$internship->title}}</h4></a>
                        <p>{{$internship->bio}}</p>
                    </div>
                @empty
                    <div>
                        <p>Er is nog geen stage vrijgegeven</p>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="list--background">
            <div>
                <h4>Locatie</h4>
                <p>{{ $company->location }}</p>
            </div>
            <div>
                <h4>Nearest train station</h4>
                @if(count($getNearestTrainStation))
                    <p>{{ $getNearestTrainStation[0]->name}}</p>
                @else
                    <p>No stations found</p>
                @endif
            </div>
        </div>
        
        <div class="company--profile-contact">
            <h4>Contact</h4>
            <p>{{ $company->email }}</p>
            <p>{{ $company->phone }}</p>
        </div>
    </div>
@endsection
