<h1>Company</h1>

<h1>{{ $company->name}}</h1>
<p>{{ $company->bio}}</p>
<p>{{ $company->projects}}</p>
<p>{{ $company->location}}</p>
<p>{{ $company->email}}</p>
<p>{{ $company->phone}}</p>

<h1>Internships</h1>

@foreach ($company[0]->internships as $internship )
    <a href="/internships/{{$internship->id}}"><h1>{{$internship->id}}</h1></a>
    <p>{{$internship->bio}}</p>
@endforeach
