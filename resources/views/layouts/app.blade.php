<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Title -->
  <title>Dashboard</title>
  <!-- Scripts -->
  <script src="{{asset('js/app.js')}}" defer></script>
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  <!-- Styles -->
  <link href="{{url('css/filoApp.css')}}" rel="stylesheet" type="text/css"/>
  <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>
<body>
  <div id="app">
    <!-- Define the navbar -->
    <nav class="navbar navbar-expand-md navbar-light shadow-sm">
      <div class="container">
        <!-- Left Side Of Navbar -->
        <a id="white" class="navbar-brand" href="{{ url('/') }}">Find The Lost</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Right Side Of Navbar -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            @guest
              <!-- Authentication Links -->
              <li class="nav-item">
                <a id="white" class="nav-link" href="{{ route('login') }}">{{__('Login')}}</a>
              </li>
              @if (Route::has('register'))
                <!-- Authentication Links -->
                <li class="nav-item">
                  <a id="white" class="nav-link" href="{{ route('register') }}">{{__('Register')}}</a>
                </li>
              @endif
            @else
              <!-- Navbar dropdown -->
              <li class="nav-item dropdown">
                <a id="white" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{Auth::user()->name}}
                  <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ url('home') }}" class="btn btn-primary"><span>Dashboard</span></a>
                  <a class="dropdown-item" href="{{ url('item_requests') }}" class="btn btn-primary"><span>Requests</span></a>
                  @if(Gate::allows('user-admin'))
                    <a class="dropdown-item" href="{{ route('display_users') }}" class="btn btn-primary"><span>Display users</span></a>
                  @endif
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span>{{ __('Logout') }}</span></a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </div>
              </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>

    <!-- Content from child extensions -->
    <main class="py-4">
      @yield('content')
    </main>
  </div>
</body>
</html>
