@extends('layouts.app')

@section('content')
<div class="container-applications">
    <div class=""> 
        <h1 class="page--title">{{ $internship->title }}</h1>

        <div class="col-md-12">
            <h2 class="page--title">Overzicht solicitanten</h2>
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
                                    <th>Motivatie</th>
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
                                            <td>{{$application->motivation}}</td>
                                            @if($application->label == "new")
                                                <td>{{$application->label}}</td>
                                            @else
                                                 <td>verwerkt</td>
                                            @endif
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

@section('javascript')
    <script type="text/javascript">
        var dropDownValue = document.getElementById("label_filter");
        var applicationData = document.querySelectorAll(".application_data");
        var keywordValue = '';
        var applicationName = '';
        var applicationBio = '';
        document.getElementById("search_button").addEventListener("click", function(){
            keywordValue = document.getElementById("keyword").value;
            var dropDownResult = dropDownValue.options[dropDownValue.selectedIndex].value;
            for(var i = 0; i<applicationData.length; i++){
                var applicationDataLabel = applicationData[i].getAttribute('data-label');
                applicationName = applicationData[i].childNodes[2].nextSibling.childNodes[0].innerHTML.toLowerCase();
                applicationBio = applicationData[i].childNodes[5].innerText.toLowerCase();

                if(dropDownResult != 'none' && keywordValue != ''){
                    if(applicationDataLabel == dropDownResult && applicationName.includes(keywordValue.toLowerCase()) || applicationBio.includes(keywordValue.toLowerCase()) && applicationDataLabel == dropDownResult){
                        applicationData[i].style.display = "table-row";
                    } else {
                        applicationData[i].style.display = "none";
                    }
                } else {
                    if(dropDownResult != 'none'){
                        if(applicationDataLabel == dropDownResult){
                            applicationData[i].style.display = "table-row"; 
                        } else {
                            applicationData[i].style.display = "none";
                        }
                    } else {
                        if(applicationName.includes(keywordValue.toLowerCase()) || applicationBio.includes(keywordValue.toLowerCase())){
                            applicationData[i].style.display = "table-row";
                        } else {
                            applicationData[i].style.display = "none";
                        }
                    }
                }



            }
        });
    </script>
@endsection