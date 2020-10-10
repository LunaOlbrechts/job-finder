<h1>Companies</h1>

@foreach ($companies as $company)
<a href="/company/{{ $company->id }}"><p>{{ $company->name}}</p></a>


@endforeach