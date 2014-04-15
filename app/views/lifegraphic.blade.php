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
      <div class="healthbar_divDash">Health Bar</div>
     
      
      <div class="subtitle_divDash">How Are you Feeling Today?</div>
      
      <div class="historygraphDash">Your Health History</div>
    <div class="historygraphbox_divDash">history graph</div>
      <div class="rank_divDash">Ranking goes here</div>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <div class="Reason_divDash">Content for  class "Reason_div" Goes Here</div>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <div class="rankingbox1_divDash">
        <canvas id="canvas1" height="122" width="122"></canvas>
      </div>
      <div class="rankingbox2_divDash">
        <canvas id="canvas2" height="122" width="122"></canvas>  
      </div>
      <div class="LifeDial_divDash">Content for  class "LifeDial_div" Goes Here</div>
      <div class="rankingbox3_divDash">
        <canvas id="canvas3" height="122" width="122"></canvas> 
      </div>
      <div class="rankingbox4_divDash">
        <canvas id="canvas4" height="122" width="122"></canvas>
      </div>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <div class="totalgraph_divDash">Content for  class "totalgraph_div" Goes Here</div>
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
  <script>

    var doughnutData = [
        {
          value: 30,
          color:"#F7464A"
        },
        {
          value : 50,
          color : "#46BFBD"
        },
        {
          value : 100,
          color : "#FDB45C"
        },
        {
          value : 40,
          color : "#949FB1"
        },
        {
          value : 120,
          color : "#4D5360"
        }
      
      ];

    var myDoughnut1 = new Chart(document.getElementById("canvas1").getContext("2d")).Doughnut(doughnutData);
    var myDoughnut2 = new Chart(document.getElementById("canvas2").getContext("2d")).Doughnut(doughnutData);
    var myDoughnut3 = new Chart(document.getElementById("canvas3").getContext("2d")).Doughnut(doughnutData);
    var myDoughnut4 = new Chart(document.getElementById("canvas4").getContext("2d")).Doughnut(doughnutData);

  </script>
@stop