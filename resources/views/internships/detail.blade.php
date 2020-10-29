@extends('layouts.app')

@section('content')
<h1>Internship</h1>

<p>Title: {{ $internship[0]->title}}</p>
<p>Bio: {{ $internship[0]->bio}}</p>
<p>Expectations: {{ $internship[0]->expectations}}</p>
<p>Offers: {{ $internship[0]->offers}}</p>
<p>Location: {{ $internship[0]->location}}</p>
<p>Type: {{ $internship[0]->type}}</p>


@endsection