<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Next step | home</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
                <nav class="navbar navbar-expand-md navbar-dark shadow-sm" id="nav">
                    <div class="container">

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav mr-auto">

                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                @auth
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('companies') }}">{{ __('Companies') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('internships') }}">{{ __('Internships') }}</a>
                                    </li>
                                @endauth
                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login/student') }}">{{ __('Login student') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login/company') }}">{{ __('Login company') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register/student') }}">{{ __('Register student') }}</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register/company') }}">{{ __('Register company') }}</a>
                                        </li>
                                    @else
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }}
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    @endif
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>
            
            <div class="hero">
                <div class="hero--text">
                    <h1>Next step</h1>
                    {{-- TODO <h1>{{ Auth::guard('company')->user()->name }}</h1> --}}
                    <h2>De perfecte match tussen studenten en bedrijven</h2>  
                    <a href="" class="btn--primary">Ontdek</a>  
                </div>

                <div class="hero--image">
                    <img src="{{ asset('images/internshipIllustration.jpg') }}" alt="hero image">
                </div>
            </div>

            <div class="about--description">
                <h3>Hoe wij werken</h3>
                {{-- <div class="card-body--image">
                    <img src="{{ asset('images/student_company.png') }}">
                </div>     --}}
                <div class="row about--description-row">
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                            <div class="card-body--image">
                                <img src="{{ asset('images/student_1.png') }}">
                            </div>
                            <h5 class="card-title">Studenten</h5>
                            <p class="card-text">
                                Studenten krijgen een groot aanbod van bedrijven die stageplaatsen 
                                aanbieden binnen de IT sector. Met Next-step kan je soliciteren voor 
                                jouw favoriete stage. 
                            </p>
                            <a href="#" class="btn--primary-orange">Account aanmaken</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-body--image">
                                    <img class="bigger" src="{{ asset('images/company.png') }}">
                                </div>
                                <h5 class="card-title">Bedrijven</h5>
                                <p class="card-text">
                                    Bedrijven kunnen stageplaatsen aanmaken en hun bedrijf in de spotlights zetten.
                                    Wij voorzien een gemakkelijk admin paneel om 
                                    alle stage aanvragen te verwerken en op te volgen. 
                                </p>
                                <a href="#" class="btn--primary-orange">Account aanmaken</a>
                            </div>
                        </div>
                        </div>
                </div>
            </div>
              
        </div>

       
        <footer>
            <p> Next step </p>
        </footer>
    </body>
</html>
