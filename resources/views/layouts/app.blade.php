<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <div id="app">
      <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
        
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}"> <img alt="Charisma Logo" src="/images/logo20.png" class="hidden-xs"/>
                <span>NORVEL</span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
            @guest
            @else
  
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> 
                       {{ Auth::user()->name }}
                    </span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="{{ route('posts.index') }}">All Posts</a></li>
                  <li><a href="{{ route('posts.create') }}">Add New</a></li>
                  
                  
                  <li><hr/></li>
                  
                  <li><a href="{{ route('pages.index') }}">All Pages</a></li>
                  <li><a href="{{ route('pages.create') }}">Add New</a></li>

                  <li><hr/></li>
                  <li>
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Logout
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </ul>
            </div>
              @endguest
            <!-- user dropdown ends -->
        </div>
    </div>
  @include('partials.admin_header')
  <div class="ch-container">
    <div class="row">
      <div class="col-sm-2 col-lg-2">
           @guest
           @else
            @include('partials.admin_sidebar')
           @endguest
       
      </div>
      <div id="content" class="col-sm-10 col-lg-10">
           @yield('content')
      </div>
    </div>
  @include('partials.footer')
   </div>
  </div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
