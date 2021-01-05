@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="page--title-companies">Stages</h1>

        <form method="POST" action="{{ route('searchInternships') }}">
            {{ csrf_field() }}
            <div class="form-row align-items-center">
              <div class="col-auto my-1">
                <label class="mr-sm-2" for="inlineFormCustomSelect">Type</label>
                <select class="custom-select mr-sm-2" name="type" id="inlineFormCustomSelect">
                  <option selected>Choose...</option>
                  <option value="front-end">front-end</option>
                  <option value="back-end">back-end</option>
                  <option value="design">design</option>
                </select>
              </div>

              <div class="col-auto my-1">
                <button type="submit" class="btn btn-primary">Zoek</button>
              </div>
            </div>
          </form>

        <div class="cards">
            @forelse ($internships as $internship)
                <div class="card--preview">
                    @if($internship->created_at > $lastWeek )
                    <div class="card--badge">Nieuw</div>                    
                    @endif
                    <div class="card--imgContainer">
                        <img src="{{ $internship->company->logo}}" class="card--logo">
                    </div>
                    <a href="/internships/{{ $internship->id }}/detail" class="card--name"><p>{{ $internship->title}}</p></a>
                    <p class="card--text">{{ $internship->type }}</p>
                    <div class="card--button">
                        <a href="/internships/{{ $internship->id }}/detail">></a>
                    </div>
                </div>

            @empty
                <div>
                    <p>Er zijn geen stages gevonden met jouw zoekopdracht</p>
                </div>
            @endforelse
        </div>

        @auth('company')
        <a href="/internships/create/{{ Auth::company()->id }}"><p>create</p></a>
        @endauth
    </div>
@endsection