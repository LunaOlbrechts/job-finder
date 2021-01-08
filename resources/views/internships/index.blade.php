@extends('layouts.app')

@section('content')
        <h1 class="page--title-companies">Stages</h1>

        @auth('company')
          <div class="create--internship-container">
            <a href="/internships/create/{{ Auth::guard('company')->user()->id }}" class="btn--create">Nieuwe stage aanmaken</a>
          </div>
        @endauth

        <form method="POST" action="{{ route('searchInternships') }}" class="form--searchInternships">
            {{ csrf_field() }}
            <div class="form-row align-items-center">
              <div class="col-auto my-1 form--searchInternships-select">
                <select class="custom-select mr-sm-2 form--searchInternships-selectholder" name="type" id="inlineFormCustomSelect">
                  <option selected>Type stage...</option>
                  <option value="front-end">front-end</option>
                  <option value="back-end">back-end</option>
                  <option value="design">design</option>
                </select>
              </div>

              <div class="col-auto my-1">
                <button type="submit" class="btn btn-primary form--searchInternships-btn">Zoek</button>
              </div>
            </div>
        </form>

        @if(Auth::guard('web')->user())
        <h2 class="center">Suggesties</h2>
          <div class="cards">
            @if(isset($suggestion))
              @foreach ($suggestion as $suggestion)
                <div class="card--preview card--preview-padd">
                      @if($suggestion->created_at > $lastWeek )
                      <div class="card--badge">Nieuw</div>                    
                      @endif
                      <div class="card--imgContainer">
                          <img src="{{ $suggestion->company->logo}}" class="card--logo">
                      </div>
                      <a href="/internships/{{ $suggestion->id }}/detail" class="card--name"><p>{{ $suggestion->title}}</p></a>
                      <p class="card--text">{{ $suggestion->type }}</p>
                      <a href="/internships/{{ $suggestion->id }}/detail" class="btn--primary-purple btn--primary-sm">Bekijk</a>
                      
                </div>
              @endforeach
            @else
              <p>Er zijn momenteel nog geen suggesties</p>
            @endif
          </div>
        @endif
        
        @if(Auth::guard('web')->user())
          <h2 class="center">Alle stages</h2>
        @endif
        <div class="cards">
            @forelse ($internships as $internship)
                <div class="card--preview card--preview-padd">
                    @if($internship->created_at > $lastWeek )
                    <div class="card--badge">Nieuw</div>                    
                    @endif
                    <div class="card--imgContainer">
                        <img src="{{ $internship->company->logo}}" class="card--logo">
                    </div>
                    <a href="/internships/{{ $internship->id }}/detail" class="card--name"><p>{{ $internship->title}}</p></a>
                    <p class="card--text">{{ $internship->type }}</p>
                    <a href="/internships/{{ $internship->id }}/detail" class="btn--primary-purple btn--primary-sm">Bekijk stage</a>
                </div>

            @empty
                <div>
                    <p>Er zijn geen stages gevonden met jouw zoekopdracht</p>
                </div>
            @endforelse
        </div>
@endsection