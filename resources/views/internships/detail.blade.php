@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>{{ $internship[0]->title}}</h1>

    <div>
      <p>Bio: {{ $internship[0]->bio}}</p>
      <p>Expectations: {{ $internship[0]->expectations}}</p>
      <p>Offers: {{ $internship[0]->offers}}</p>
      <p>Location: {{ $internship[0]->location}}</p>
      <p>Type: {{ $internship[0]->type}}</p>
    </div>

    <h1>Apply</h1> 

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