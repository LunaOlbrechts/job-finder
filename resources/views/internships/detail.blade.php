@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>{{ $internship->title}}</h1>
    <div>
      <div>
        <h3>Company</h3>
        <a href="/companies/{{ $internship->company->id }}"><p>{{$internship->company->name}}</p><a>
      </div>
      <div>
        <h3>Biography</h3>
        <p>{{ $internship->bio}}</p>
      </div>
      <div>
        <h3>Expectations</h3>
        <p>{{ $internship->expectations}}</p>
      </div>
      <div>
        <h3>Offers</h3>
        <p>{{ $internship->offers}}</p>
      </div>
      <div>
        <h3>Location</h3>
        <p>{{ $internship->location}}</p>
      </div>
      <div>
        <h3>Type</h3>
        <p>{{ $internship->type}}</p>
      </div>
    </div>

    <h2>Apply</h2> 

    <div class="card">
      <form method="post" action="">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="motivation">Motivation</label>
          <textarea class="form-control" id="motivation" name="motivation" rows="3" placeholder="motivation"></textarea>
        </div>

        <button type="submit" class="btn btn-primary" name="internship" value="{{request()->route('internship')}}">Create application</button>
      </form>
    </div>
  </div>
@endsection