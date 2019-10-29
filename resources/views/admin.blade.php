<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />


        <title>Event App Admin Page</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' type='text/css' media='all' />
				<link rel='stylesheet' href={{ asset('css/bootstrap-responsive.min.css') }}' type='text/css' media='all' />
				<link href="https://cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet" />
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <header class="navbar navbar-default">
              <div class="container-fluid">
                <div class="navbar-header">
                    <img src="{{ asset('/imgs/sharp_logo_black.svg') }}" class="navbar-brand">
                </div>
                <ul class="nav navbar-nav navbar-right">
                	<li><a href="/">Landing Page</a></li>
                    <li><a href="/admin/">RSVPs</a></li>
                    <li><a href="/admin/unknown">Unknowns</a></li>
                    <li><a href="/admin/list">Settings</a></li>
                </ul>
                </div>
            </header>

            <div class="content">
               @yield('content')
            </div>
        </div>
        
        <script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>

    </body>
</html>
