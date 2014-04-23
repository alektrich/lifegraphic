<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <title>LifeGraphic</title>
    {{ HTML::style('css/main.css')}}
    {{ HTML::style('css/dashboard.css')}}
    {{ HTML::style('packages/bootstrap/css/bootstrap.min.css') }}
    {{ HTML::script('packages/ChartJS/Chart.min.js') }}
    {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js') }}
    {{ HTML::script('js/jqwidgets/jqwidgets/jqxgauge.js') }}
  </head>
 
  <body>
 	
  	<div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <ul class="nav nav-tabs"> 
                    <li>{{ HTML::link('users/register', 'Register') }}</li>  
                    <li>{{ HTML::link('users/login', 'Login') }}</li>  
                    <li>{{ HTML::link('aboutus', 'About Us') }}</li>  
                </ul> 
            </div>
        </div>
    </div> 

    <div class="container">

        @if(Session::has('message'))
            <p class="alert">{{ Session::get('message') }}</p>
        @endif

        @yield('content');

    </div>

  </body>
  @yield('script')
</html>