@extends('layouts.main')

@section('content')
  <div class="containerDash">
    <div class="HeaderDash">
      <div class='alert alert-success'><p>Welcome, {{$firstname}}!</p></div>
    </div>
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
      <p>Content for  class "progressbar" Goes Here</p>
      <p>&nbsp;</p>
    </div>
    <div class="TopsectionDash">
     <div class="Time_divDash">Time: 13:00</div>
      <div class="datestamp_divDash">Date: 01/01/2014</div>
      <div class="lovebar_divDash">Love Bar</div>
     
      
      <div class="subtitle_divDash">How's your love life Today?</div>
      
      <div class="historygraphDash historygraphDashLove">Your Love History</div>
    <div class="historygraphbox_divDash">
      <canvas id="historyGraphCanvasLove" width="280" height="150"></canvas>
    </div>
      <div class="rank_divDash">Ranking goes here</div>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <div class="Reason_divDash">Content for  class "Reason_div" Goes Here</div>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <div class="rankingbox1_divDash">
        <a href="{{ URL::to('/love') }}"><p class="categoryLove">Love</p></a> 
        <canvas id="canvas1" height="80" width="80"></canvas>
      </div>
      <div class="rankingbox2_divDash">
        <a href="{{ URL::to('/') }}"><p class="categoryHealth">Health</p></a>  
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
    <div class="catbarDash">
      <p>Content for  class "catbar" Goes Here</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    </div>
    <div class="catbarDash">
      <p>Content for  class "catbar" Goes Here    </p>
      <p>&nbsp;</p>
    </div>
    <div class="catbarDash">
      <p>Content for  class "catbar" Goes Here    </p>
      <p>&nbsp;</p>
    </div>
    <div class="catbarDash">
      <p>Content for  class "catbar" Goes Here </p>
      <p>&nbsp;</p>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
@stop

@section('script')

  {{ HTML::script('js/graphics.js') }}

@stop