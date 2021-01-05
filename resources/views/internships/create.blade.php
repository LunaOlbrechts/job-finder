@extends('layouts.app')

@section('title')
Create internship
@endsection

@section('content')

    <div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">
        <h1>Create Internship</h1> 

            <div class="card">

     <form method="post" action="/internships">


          {{ csrf_field() }}
          
          <div class="form-group">
          <label for="title">Title</label>
          <textarea class="form-control" id="title" name="title" rows="1" placeholder="Title"></textarea>
          </div>

          <div class="form-group">
          <label for="bio">Bio</label>
          <textarea class="form-control" id="bio" name="bio" rows="3" placeholder="Bio"></textarea>
          </div>

          <div class="form-group">
          <label for="type">Type</label>
          <textarea class="form-control" id="type" name="type" rows="1" placeholder="Type"></textarea>
          </div>


          <div class="form-group">
          <label for="expectations">expectations</label>
          <textarea class="form-control" id="expectations" name="expectations" rows="3" placeholder="expectations"></textarea>
          </div>

          
          <div class="form-group">
          <label for="offers">offers</label>
          <textarea class="form-control" id="offers" name="offers" rows="3" placeholder="offers"></textarea>
          </div>

          <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Regio') }}</label>

            <div class="col-md-6">
                <select class="form-control" name="regio">
                    <option value="kies">kies</option>
                    <option value="Antwerpen">Antwerpen</option>
                    <option value="Gent">Gent</option>
                    <option value="Leuven">Leuven</option>
                    <option value="Brussel">Brussel</option>
                    <option value="Hasselt">Hasselt</option>
                    <option value="Brugge">Brugge</option>
                    <option value="Waasland">Waasland</option>
                    <option value="Mechelen">Mechelen</option>
                    <option value="Aalst">Aalst</option>
                </select>  
            </div>
        </div>
          
          <div class="form-group">
          <label for="location">location</label>
          <textarea class="form-control" id="location" name="location" rows="1" placeholder="location"></textarea>
          </div>

          <button type="submit" class="btn btn-primary" name="company_id" value="{{request()->route('company_id')}}">Create internship</button>

     </form>

     </div>
        </div>
    </div>
</div>
@endsection
