@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>Applications</div>
                    </div>
                </div>



                <div class="card-body">
                    <div class="mb-2">
                        <form action="" class="form-inline">
                            <label for="label_filter">Filter by label &nbsp;</label>
                            <select name="label" id="label_filter" class="form-control">
                                <option value="none">Select label</option>
                                <option value="approved">Approved</option>
                                <option value="declined">Declined</option>
                                <option value="starred">Starred</option>
                                <option value="new">New</option>
                            </select>
                            <label for="keyword">&nbsp;&nbsp;</label>
                            <input type="text" class="form-control" name="keyword" placeholder="Enter keyword" id="keyword">
                            <span>&nbsp;</span>

                            <button id="search_button" type="button" class="btn btn-primary">Search</button>
                            <a href="" class="btn btn-success">Clear</a>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table style="width: 100%;" class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Student</th>
                                    <th>Internship</th>
                                    <th>Label</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($applications))
                                    @foreach($applications as $application)
                                        <tr class="application_data" data-label="{{$application->label}}">
                                            <td>{{ $application->id }}</td>
                                            <td><a href="/students/{{ $application->user_id }}">{{$application->name}}</a></td>
                                            <td><a href="/internships/{{ $application->internship_id }}/detail">{{ $application->bio }}</a></td>
                                            <td>{{$application->label}}</td>
                                            <td style="width: 250px;">

                                            <form action="{{ route('file_update', $application->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('PATCH') }}
                                                <button name="decline" value="decline" type="submit" class="btn btn-danger" style="margin-top: 10px;">Decline</button>
                                                <button name="approve" value="approve" type="submit" class="btn btn-success" style="margin-top: 10px;">Approve</button>
                                            </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6">No applications found</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
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
                if(dropDownResult == 'none'){
                    applicationData[i].style.display = "table-row";
                } else if(applicationDataLabel != dropDownResult){
                    applicationData[i].style.display = "none";
                } else {
                    applicationData[i].style.display = "table-row";
                }
                applicationName = applicationData[i].childNodes[2].nextSibling.childNodes[0].innerHTML.toLowerCase();
                applicationBio = applicationData[i].childNodes[5].innerText.toLowerCase();
                if(applicationName.includes(keywordValue.toLowerCase()) || applicationBio.includes(keywordValue.toLowerCase())){
                    applicationData[i].style.display = "table-row";
                } else {
                    applicationData[i].style.display = "none";
                }
            }
        });
    </script>
@endsection