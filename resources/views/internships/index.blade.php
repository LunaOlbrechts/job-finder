<h1>Internships</h1>

@foreach ($internships as $internship)
    <a href="/internships/{{ $internship->id }}/detail"><p>{{ $internship->company_id}}</p></a>
@endforeach