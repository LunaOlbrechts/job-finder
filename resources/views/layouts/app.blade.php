<!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <!-- CSRF Token -->
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <title>Next step </title>
            
            <!-- Scripts -->
            <script
            src="https://code.jquery.com/jquery-3.5.1.js"
            integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
            crossorigin="anonymous"></script>            
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <script src="{{ asset('/js/ajax.js') }}"></script>

            <!-- Fonts -->
            <link rel="dns-prefetch" href="//fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

            <!-- Styles -->
            <style>
                .coordinates{
                    display: none !important;
                }
            </style>
            
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        
        </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-dark shadow-sm" id="nav">
                <div class="container">

                    @auth('company')
                        <a class="navbar-brand" href="{{ route('company', ['company' => Auth::guard('company')->user()->id]) }}">
                            {{ 'Next Step' }}
                        </a>
                    @endauth
                    @auth('web')
                        @if (!in_array(Route::currentRouteName(), ['register/student', 'login/student', 'register/company', 'login/company']))
                        <a class="navbar-brand" href="{{ route('student', ['student' => Auth::guard('web')->user()->id]) }}">
                            {{ 'Next Step' }}
                        </a>
                        @endif
                    @endauth

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
                            @if(Auth::guard('web')->user() or Auth::guard('company')->user())
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('students') }}">{{ __('Studenten') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('companies') }}">{{ __('Bedrijven') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('internships') }}">{{ __('Stages') }}</a>
                                </li>

                                @if(Auth::guard('company'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="/company/{{ Auth::guard('company')->user()->id }}/dashboard">{{ __('Dashboard') }}</a>
                                    </li>
                                @endif
                                <li class="nav-item">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @if(Auth::guard('web')->user())
                                                {{ Auth::guard('web')->user()->name }}
                                            @elseif(Auth::guard('company')->user())
                                                {{ Auth::guard('company')->user()->name }}
                                            @endif
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Uitloggen') }}
                                             </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                      </div>
                            

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
                            @else
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
                                    
                                @endif
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
            <main>
                @yield('content')
            </main>
        </div>

        <footer>
            <div>
                <h4>Contact</h4>
                <ul>
                    <li>hello@nextstep.be</li>
                    <li>Gelaagstraat 30, 9140 Steendorp</li>
                </ul>
            </div>
            <p> © Next Step </p>
        </footer>
        @yield('javascript')
        <script src="{{asset('js/app.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    </body>
</html>

