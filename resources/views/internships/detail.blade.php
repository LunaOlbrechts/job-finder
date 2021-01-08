@extends('layouts.app')

@section('content')
  <div class="list">
    <h1 class="list--name-internship">{{ $internship->title}}</h1>
    <div class="list--logo">
      <img src=" {{$internship->company->logo }}">
    </div>
    <div class="list--name">
      <a href="/companies/{{ $internship->company->id }}"><h3>{{$internship->company->name}}</h3></a>
    </div>

    <div>
      <h3>Type</h3>
      <p>{{ $internship->type}}</p>
    </div>

    <div>
      <h3>Biografie</h3>
      <p>{{ $internship->bio}}</p>
    </div>

    <div class="list--background">
      <div>
        <h3>Verwachtingen</h3>
        <p>{{ $internship->expectations}}</p>
      </div>
    </div>

    <div>
      <h3>Aanbiedingen</h3>
      <p>{{ $internship->offers}}</p>
    </div>

    <div class="company--profile-contact">
      <h4>Locatie</h4>
      <p>{{ $internship->location}}</p>
    </div>

    <div class="card--internshipApplication list--background">
      <h3>Soliciteer</h3> 
      <form method="post" action="">
        {{ csrf_field() }}

        <div class="form-group">
          <label for="exampleFormControlFile1">CV*</label>
          <input type="file" class="form-control-file" required id="exampleFormControlFile1" name="cv">
        </div>

        <div class="form-group">
          <label for="motivation">Portfolio website</label>
          <textarea class="form-control" id="motivation" name="website" rows="1" placeholder=" url"></textarea>
        </div>

        <div class="form-group">
          <label for="motivation">Motivatie*</label>
          <textarea class="form-control" id="motivation" required name="motivation" rows="3" placeholder=""></textarea>
        </div>

        <button type="submit" class="btn btn--primary-gold" name="internship" value="{{request()->route('internship')}}">Inzenden</button>
      </form>
    </div>

  </div>
@endsection