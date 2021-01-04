@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action='{{ route("students/update", $student->id) }}' enctype="multipart/form-data">
                    <div class="card-header">{{ __('Update profile') }}
                        <button style="position: absolute; right: 5%; top: 4%;" type="submit" name="submit" value="back" class="btn btn-secondary">
                            <a href="{{ route('student', ['student' => Auth::user()->id]) }}">{{ __('Back') }}</a>
                        </button>
                       
                    </div>
                        @csrf

                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{session('success')}}
                            </div>
                        @endif

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" value="{{ $student['name'] }}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" value="{{ $student['email'] }}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Age') }}</label>
                            <div class="col-md-6">
                                <input id="age" value="{{ $student['age'] }}" type="number" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}"  autocomplete="age">
                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dribbble" class="col-md-4 col-form-label text-md-right">{{ __('Dribbble username?') }}</label>
                            <div class="col-md-6">
                                <!--<input id="dribbble_yes" type="radio" value="yes" name="dribbble" checked>Yes</input>
                                <input id="dribbble_no" type="radio" value="no" name="dribbble">No</input>-->
                                <input id="dribbble" value="{{ $student['dribbble'] }}" type="text" class="form-control @error('dribbble') is-invalid @enderror" name="dribbble" value="{{ old('dribbble') }}"  autocomplete="dribbble">
                                @error('dribbble')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bio" class="col-md-4 col-form-label text-md-right">{{ __('Bio') }}</label>
                            <div class="col-md-6">
                                <textarea id="bio" value="{{ $student['bio'] }}" class="form-control @error('bio') is-invalid @enderror" name="bio"  autocomplete="bio">{{ $student['bio'] }}</textarea>
                                @error('bio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="preference" class="col-md-4 col-form-label text-md-right">{{ __('Preference') }}</label>
                            <div class="col-md-6">
                                <select id="preference" value="{{ $student['preference'] }}" type="text" class="form-control @error('preference') is-invalid @enderror" name="preference" value="{{ old('preference') }}"  autocomplete="preference">
                                    <option value="{{ $student['preference'] }}">{{ $student['preference'] }}</option>
                                    <option value="Development">Development</option>
                                    <option value="Design">Design</option>
                                    <option value="Backend-development">Backend development</option>
                                    <option value="Frontend-development">Frontend development</option>
                                    <option value="Design and Development">Design and development</option>
                                </select>
                                @error('preference')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

          

                        <div class="form-group row">
                            <label for="portfolio" class="col-md-4 col-form-label text-md-right">{{ __('Portfolio') }}</label>
                            <div class="col-md-6">
                                <input id="portfolio" value="{{ $student['portfolio'] }}" type="url" class="form-control" name="portfolio" value="{{ old('portfolio') }}"  autocomplete="portfolio">
                                @error('portfolio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!--<div class="form-group row">
                            <label for="cv" class="col-md-4 col-form-label text-md-right">{{ __('CV') }}</label>
                            <div class="col-md-6">
                                <input id="cv" value="{{ $student['cv'] }}" type="file" class="form-control" name="cv" value="{{ old('cv') }}"  autocomplete="cv">
                                @error('cv')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>-->

                        <div class="form-group row">
                            <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Adress') }}</label>
                            <div class="col-md-6">
                                <input id="location" value="{{ $student['location'] }}" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}"  autocomplete="location">
                            
                                @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="linkedin" class="col-md-4 col-form-label text-md-right">{{ __('LinkedIn') }}</label>
                            <div class="col-md-6">
                                <input id="linkedin" value="{{ $student['linkedin'] }}" type="url" class="form-control" name="linkedin" value="{{ old('linkedin') }}"  autocomplete="linkedin">
                                @error('linkedin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" name="submit" value="submit" class="btn btn-primary">
                                    {{ __('Update profile') }}
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
