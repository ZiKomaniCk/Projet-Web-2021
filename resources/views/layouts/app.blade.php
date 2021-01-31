<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>GAMINGUE</title>
    @yield('extra-script')
    
    <link rel = "icon" href =  
    "\images\site\ALPHA.png" 
    type = "image/x-icon"> 
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('extra-meta')
    
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> --}}
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-white bg-gray2e shadow-sm border-bottom border-primary">
            <div class="container">
                <a class="navbar-brand fs-2 fw-bold" style="text-shadow: -2px 2px  #1e1e1e;" href="{{ url('/') }}">
                    {{-- {{ config('app.name', '') }}  --}}
                    Gamingue
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    {{-- <ul class="navbar-nav mr-auto">
                        
                    </ul> --}}
                    {{-- <div style="flex: 1"  class="pl-5 pr-5">
                        <input class="form-control " placeholder="Nom du jeux" type="text" name="search"  >
                    </div> --}}
                    
                    
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto fs-6">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item mt-2">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item mt-2 text-white">
                            <a class="nav-link text-white" href="{{ route('register') }}">{{ __("S'enregistrer") }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            
                            {{-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a> --}}
                            
                            <a class="btn btn-gray1e dropdown-toggle mt-2" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                {{Auth::user()->nickname}}
                            </a>
                            
                            
                            <div class="dropdown-menu dropdown-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Se déconnecter') }}
                            </a>
                            
                            <a class="dropdown-item" href="{{ route('home') }}">
                                Profil
                            </a>
                            
                            @can('manage-users')
                            <a class="dropdown-item" href="{{ route('admin.users.index') }}">
                                Gestions Utilisateurs
                            </a>
                            
                            <a class="dropdown-item" href="{{ route('admin.games.index') }}">
                                Gestions Jeux
                            </a>
                            
                            <a class="dropdown-item" href="{{ route('admin.orders.index') }}">
                                Achats
                            </a>
                            
                            <a class="dropdown-item" href="{{ route('admin.dashboards.index') }}">
                                Tableau de bord
                            </a>
                            @endcan
                            
                            {{-- @if (Auth::user()->hasRole('user'))
                            <a class="dropdown-item" href="{{ route('admin.users.edit', ['user' => Auth::user()]) }}">
                                Modifier le profil
                            </a>
                            @endif --}}
                            
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                    <li class="nav-item">
                        @guest
                        {{-- <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a> --}}
                        <a href="{{ route('login') }}" class="nav-link text-white mt-2 bg-primary rounded-pill">Panier</a>
                        @else
                        <a href="{{ route('carts.index') }}" class="nav-link text-white mt-1 ml-4 fs-5 bg-primary rounded-pill ">
                            Panier <span class="badge badge-pill badge-dark">{{ Cart::count()}}</span>
                            
                        </a>
                        {{-- <a href="{{ route('carts.index') }}" class="nav-link text-white mt-3">
                            Panier {{ count(Auth::user()->carts) }}
                        </a> --}}
                        @endguest
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <main class="py-4">
        @yield('content')
    </main>
</div>

<footer class="site-footer border-top border-bottom border-primary">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <h6>A propos</h6>
          <p class="text-justify">Ce site a été fait dans le cadre de nos projets finaux a Ynov. 
              Tout ce que vous verrez ici n'est que fictif et à été fait pour remplir le site de contenu.</p>
              <p>Si vous voulez nous donner votre avis sur le site n'hésitez pas : <strong>totolefrero31@gmail.com</strong></p>
        </div>

        <div class="col-xs-6 col-md-3 ml-5">
          <h6>Contact</h6>
          <ul class="footer-links">
            <li><p>Numero de Tel : 06 08 07 18 86</p></li>
            <li><p>Mail : contactEkip@ceqonveut.com</p></li>
         
 
          </ul>
        </div>

        
      </div>
      <hr>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
          <p class="copyright-text">Copyright &copy; 2021 All Rights Reserved. <span class="float-right">S/O Don Dada, L'entourage, Grande Ville Cool, Connexion, EKIP</span>
          </p>
        </div>


      </div>
    </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
@yield('extra-js')
{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> --}}
</body>
</html>
