<h1>Company</h1>

<h1>{{ $company[0]->name}}</h1>
<p>{{ $company[0]->bio}}</p>
<p>{{ $company[0]->projects}}</p>
<p>{{ $company[0]->location}}</p>
<p>{{ $company[0]->email}}</p>
<p>{{ $company[0]->phone}}</p>


<h1>Internships</h1>


@foreach ($company[0]->internships as $internship )
    <a href="/internships/{{$internship->id}}"><h1>{{$internship->id}}</h1></a>
    <p>{{$internship->bio}}</p>
@endforeach
