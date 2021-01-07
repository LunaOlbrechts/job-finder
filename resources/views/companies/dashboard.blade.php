@extends('layouts.app')

@section('content')
<div class="container-dashboard">
        <h1 class="page--title-companies">Dashboard</h1>
        <div class="list"> 

            <div class="list--logo">
                <img src=" {{$company->logo }}">
            </div>
            <h1 class="list--name">{{ $company->name}}</h1>

            <div class="create--internship-container">
                <a href="/internships/create/{{ Auth::guard('company')->user()->id }}" class="btn--create">Nieuwe stage aanmaken</a>
            </div>

        <h2 class="page--title">Overzicht stages</h2>

          <div class="cards">
            @forelse ($internships as $internship)
                <div class="card--preview">
                    <div class="card--imgContainer">
                        <img src="{{ $internship->company->logo}}" class="card--logo">
                    </div>
                    <a href="/internships/{{ $internship->id }}/detail" class="card--name"><p>{{ $internship->title}}</p></a>
                    <p class="card--text">{{ $internship->type }}</p>
                    <div class="card--button">
                        <a href="/internship/{{ $internship->id }}/applications">></a>
                    </div>
                </div>

            @empty
                <div>
                    <p>Er zijn geen stages gevonden met jouw zoekopdracht</p>
                </div>
            @endforelse
          </div>

          <div class="col-md-12">
            <h2 class="page--title">Overzicht aanvragen</h2>
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>Goedgekeurde solicitanten</div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <form method="POST" action="" class="form-inline">
                            <label for="label_filter">Filter op label &nbsp;</label>
                            <select name="label" id="label_filter" class="form-control">
                                <option value="none">Select label</option>
                                <option value="approved">Goedgekeurd</option>
                                <option value="declined">Geweiger</option>
                                <option value="starred">Gestart</option>
                                <option value="new">New</option>
                            </select>
                            <label for="keyword">&nbsp;&nbsp;</label>
                            <input type="text" class="form-control" name="keyword" placeholder="Enter keyword" id="keyword">
                            <span>&nbsp;</span>

                            <button id="search_button" type="button" class="btn btn-primary btn--primary-gold">Zoeken</button>
                            <a href="" class="btn btn-success btn--primary-purple">Clear</a>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table style="width: 100%;" class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>Student</th>
                                    <th>Stage</th>
                                    <th>Label</th>
                                    <th>Fase</th>
                                    <th>Naar de volgende fase?</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($applications))
                                    @foreach($applications as $application)
                                        @if($application->label == "approved" or $application->label == "new" )
                                        <tr class="application_data" data-label="{{$application->label}}">
                                            <td><a href="/students/{{ $application->user_id }}">{{$application->student->name}}</a></td>
                                            <td><a href="/internships/{{ $application->internship_id }}/detail">{{ $application->internship->title }}</a></td>
                                            <td>{{$application->label}}</td>
                                            <td>{{$application->applicationFase->title}}</td>
                                            <td style="width: 250px;">

                                            <form action="{{ route('editApplicationFase', $application->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('PATCH') }}
                                                <button name="decline" value="decline" type="submit" class="btn btn-primary btn--primary-purple" style="margin-top: 10px;">Afkeuren</button>
                                                <button name="approve" value="approve" type="submit" class="btn btn-primary btn--primary-gold" style="margin-top: 10px;">Goedkeuren</button>
                                            </form>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6">Er zijn geen solicitaties gevonden</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>Afgekeurde solicitanten</div>
                    </div>
                </div>
                <table style="width: 100%;" class="table table-stripped">
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Stage</th>
                            <th>Label</th>
                            <th>Laatste fase</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($applications))
                            @foreach($applications as $application)
                                @if($application->label == "declined")
                                <tr class="application_data" data-label="{{$application->label}}">
                                    <td><a href="/students/{{ $application->user_id }}">{{$application->student->name}}</a></td>
                                    <td><a href="/internships/{{ $application->internship_id }}/detail">{{ $application->internship->title }}</a></td>
                                    <td>{{$application->label}}</td>
                                    <td>{{$application->applicationFase->title}}</td>
                                </tr>
                                @endif
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">Er zijn geen solicitaties gevonden</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

