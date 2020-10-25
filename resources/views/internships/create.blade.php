@extends('layouts.app')

@section('title')
Create internship
@endsection

@section('content')
    <h1>Create new internship</h1>

     <form method="post" action="/internships">

          {{ csrf_field() }}

          <div class="form-group">
          <label for="bio">bio</label>
          <input type="text" class="form-control" id="bio" name="bio" placeholder="bio">
          </div>

          <div class="form-group">
          <label for="type">type</label>
          <textarea class="form-control" id="type" name="type" rows="3" placeholder="type"></textarea>
          </div>


          <div class="form-group">
          <label for="expectations">expectations</label>
          <input type="text" class="form-control" id="expectations" name="expectations" placeholder="expectations">
          </div>

          
          <div class="form-group">
          <label for="offers">offers</label>
          <input type="text" class="form-control" id="offers" name="offers" placeholder="offers">
          </div>

          
          <div class="form-group">
          <label for="location">location</label>
          <textarea class="form-control" id="location" name="location" rows="5" placeholder="location"></textarea>
          </div>

          <button type="submit" class="btn btn-primary" name="company_id" value="{{request()->route('company_id')}}">Create internship</button>

     </form>
@endsection