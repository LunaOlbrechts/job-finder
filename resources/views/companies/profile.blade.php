<h1>Company</h1>

<h1>{{ $companies[0]->name}}</h1>
<p>{{ $companies[0]->bio}}</p>
<p>{{ $companies[0]->projects}}</p>
<p>{{ $companies[0]->location}}</p>
<p>{{ $companies[0]->email}}</p>
<p>{{ $companies[0]->phone}}</p>
<br>

<p><a href="/companies/{{$companies[0]->id}}/filter"><h1>{{  __('Applications') }}</h1></a></p>
<br>

<h1>Internships</h1>


@foreach ($companies[0]->internships as $internship )
    <a href="/internships/{{$internship->id}}"><h1>{{$internship->id}}</h1></a>
    <p>{{$internship->bio}}</p>
@endforeach
