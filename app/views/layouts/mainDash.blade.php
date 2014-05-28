<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <title>LifeGraphic</title>
    {{ HTML::style('css/main.css')}}
    {{ HTML::style('css/dashboard.css')}}
    {{ HTML::style('packages/bootstrap/css/bootstrap.min.css') }}
    {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js') }}
    {{ HTML::script('packages/bootstrap/js/bootstrap.min.js') }}
    {{ HTML::script('packages/ChartJS/Chart.js') }}
    {{ HTML::script('js/gauge.min.js') }}
  </head>
 
  <body>
 	
  	<div class="navbar navbar-top">
        <div class="navbar-inner">
            <div class="container">
                <ul class="nav nav-tabs"> 
                    <li>{{ HTML::link('/logout', 'Logout') }}</li>  
                    <li>{{ HTML::link('aboutUs', 'About Us') }}</li>  
                <p class="navbar-text navbar-right">Logged in as <a href="#" class="navbar-link">{{$firstname}} {{$lastname}}</a></p>
                </ul> 
            </div>
        </div>
    </div> 

    <div class="container">

        @if(Session::has('message'))
            <p class="alert">{{ Session::get('message') }}</p>
        @endif

        <div class="containerDash">

            <div class="LeftpanelDash">
              <div class="leftpanel_rowsDash">Status</div>
              <div class="leftpanel_rowsDash">My Profile</div>
              <div class="leftpanel_rowsDash">Calendar</div>
              <div class="leftpanel_rowsDash">Question</div>
              <div class="leftpanel_rowsDash">Forum</div>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>Goes Here</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
            </div>
            <p>&nbsp;</p>
            <div class="progressbarDash">
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
            </div>
            @yield('content');
              <p>&nbsp;</p>
              <div class="rankingbox1_divDash">
                <a href="{{ URL::to('/love') }}"><p class="categoryLove">Love</p></a> 
                <canvas id="canvas1" height="80" width="80"></canvas>
              </div>
              <div class="rankingbox2_divDash">
                <a href="{{ URL::to('/health') }}"><p class="categoryHealth">Health</p></a>  
                <canvas id="canvas2" height="80" width="80"></canvas>  
              </div>
              <div class="LifeDial_divDash">
                <canvas id="canvasTotal" height="100" width="175"></canvas>
              </div>
              <div class="rankingbox3_divDash">
                <a href="{{ URL::to('/assets') }}"><p class="categoryAssets">Assets</p></a> 
                <canvas id="canvas3" height="80" width="80"></canvas> 
              </div>
              <div class="rankingbox4_divDash">
                <a href="{{ URL::to('/mood') }}"><p class="categoryMood">Mood</p></a> 
                <canvas id="canvas4" height="80" width="80"></canvas>
              </div>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <div class="totalgraph_divDash">
                <canvas id="totalCanvasGraph" height="170" width="725"></canvas>
              </div>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
            </div>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <div class="catbarDash Love">
            <p class="paragraphBarLove">Love</p>  
             <p>&nbsp;</p>
             <p>&nbsp;</p>
            </div>
            <div class="catbarDash Health">
            <p class="paragraphBarHealth">Health</p> 
             <p>&nbsp;</p>
             <p>&nbsp;</p>
            </div>
            <div class="catbarDash Assets">
            <p class="paragraphBarAssets">Assets</p> 
             <p>&nbsp;</p>
             <p>&nbsp;</p>
            </div>
            <div class="catbarDash Mood">
            <p class="paragraphBarMood">Mood</p> 
              <p>&nbsp;</p>
              <p>&nbsp;</p>
            </div>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
      </div>

  </body>
  @yield('script')
</html>