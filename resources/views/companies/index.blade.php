<h1>Companies</h1>

@foreach ($companies as $company)
    <a href="/companies/{{ $company->id }}"><p>{{ $company->name}}</p></a>
@endforeach