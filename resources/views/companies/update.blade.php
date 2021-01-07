@extends('layouts.app')

@section('content')
<br><br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card" style="height: 100%;">

                <div class="card-body">
                    <form method="POST" action='{{ route("companies/update", $company->id) }}' enctype="multipart/form-data">
                    <div class="card-header">{{ __('Update profile') }}
                        <button style="position: absolute; right: 5%;" type="submit" name="submit" value="back" class="btn btn-secondary">
                            <a href="{{ route('company', ['company' => $company->id]) }}">{{ __('Back') }}</a>
                        </button>
                       
                    </div>
                        @csrf

                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{session('success')}}
                            </div>
                        @endif
                        <br>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" value="{{ $company['name'] }}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

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
                                <input id="email" value="{{ $company['email'] }}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
                            <div class="col-md-6">
                                <input id="phone" value="{{ $company['phone'] }}" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  autocomplete="phone">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="projects" class="col-md-4 col-form-label text-md-right">{{ __('Projects') }}</label>
                            <div class="col-md-6">
                            <textarea id="projects" value="{{ $company['projects'] }}" class="form-control @error('projects') is-invalid @enderror" name="projects"  autocomplete="projects">{{ $company['projects'] }}</textarea>
                                @error('projects')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bio" class="col-md-4 col-form-label text-md-right">{{ __('Bio') }}</label>
                            <div class="col-md-6">
                                <textarea id="bio" value="{{ $company['bio'] }}" class="form-control @error('bio') is-invalid @enderror" name="bio"  autocomplete="bio">{{ $company['bio'] }}</textarea>
                                @error('bio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

          

                        <div class="form-group row">
                            <label for="logo" class="col-md-4 col-form-label text-md-right">{{ __('Logo') }}</label>
                            <div class="col-md-6">
                                <input id="logo" value="{{ $company['logo'] }}" type="url" class="form-control" name="logo" value="{{ old('logo') }}"  autocomplete="logo">
                                @error('logo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Adress') }}</label>
                            <div class="col-md-6">
                                <input id="location" value="{{ $company['location'] }}" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}"  autocomplete="location">
                            
                                @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="employees" class="col-md-4 col-form-label text-md-right">{{ __('Employees') }}</label>
                            <div class="col-md-6">
                                <input id="employees" value="{{ $company['employees'] }}" type="number" class="form-control @error('employees') is-invalid @enderror" name="employees" value="{{ old('employees') }}"  autocomplete="employees">
                                @error('employees')
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
<br><br><br>
@endsection
