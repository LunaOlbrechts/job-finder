@extends('layouts.app')

@section('title')
Create internship
@endsection

@section('content')

<div class="form--container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1>Nieuwe stage aanmaken</h1> 

            <form method="post" action="/internships">
                {{ csrf_field() }}
          
                <div class="form-group">
                    <label for="title">Titel</label>
                    <textarea class="form-control" id="title" name="title" rows="1" placeholder=""></textarea>
                </div>

                <div class="form-group">
                    <label for="bio">Bio</label>
                    <textarea class="form-control" id="bio" name="bio" rows="3" placeholder=""></textarea>
                </div>

                <div class="form-row">
                    <div class="col">
                        <label for="offers">Type stage</label>

                        <select class="form-control" name="type">
                            <option value="kies">-- selecteer --</option>
                            <option value="front-end">Front-end</option>
                            <option value="back-end">Back-end</option>
                            <option value="design">Design</option>
                        </select>  
                    </div>
                    <div class="col">
                        <label for="offers">Regio</label>
                        <select class="form-control" name="regio">
                            <option value="kies">-- selecteer --</option>
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
                    <label for="expectations">Verwachtingen</label>
                    <textarea class="form-control" id="expectations" name="expectations" rows="3" placeholder=""></textarea>
                </div>

                
                <div class="form-group">
                    <label for="offers">offers</label>
                    <textarea class="form-control" id="offers" name="offers" rows="3" placeholder=""></textarea>
                </div>
            
                <div class="form-group">
                    <label for="offers">Adres</label>
                    <textarea class="form-control" id="location" name="location" rows="1" placeholder=""></textarea>
                </div>

                <button type="submit" class="btn btn-primary btn--primary-gold" name="company_id" value="{{request()->route('company_id')}}">Stage aanmaken</button>
            </form>
        </div>
    </div>
</div>
@endsection
