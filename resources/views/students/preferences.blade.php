@extends('layouts.app')
@section('content')
<div class="form--container">
    <div class="preferences--header">
        <h1 class="center">Hallo {{ $student->name }}</h1>
        <p class="center suggestion--text">Om jouw zoektocht gemakkelijker te maken 
            gaat Next-Step voor jou opzoek naar stageplaatsen op basis van jouw voorkeuren
        </p>
        <h2 class="center">Stage voorkeuren</h2>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action='{{ route("createPreferencesForm", ["student" => Auth::id() ]) }}'>
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Type stage') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" name="type">
                                    <option value="kies">kies</option>
                                    <option value="front-end">front-end</option>
                                    <option value="back-end">back-end</option>
                                    <option value="design">design</option>
                                </select>                                
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
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


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn--primary-gold">
                                    {{ __('Bevestig') }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
