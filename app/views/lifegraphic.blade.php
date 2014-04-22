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
        <p class="categoryLove">Love</p> 
        <canvas id="canvas1" height="80" width="80"></canvas>
      </div>
      <div class="rankingbox2_divDash">
        <p class="categoryHealth">Health</p>  
        <canvas id="canvas2" height="80" width="80"></canvas>  
      </div>
      <div class="LifeDial_divDash">Content for  class "LifeDial_div" Goes Here</div>
      <div class="rankingbox3_divDash">
        <p class="categoryAssets">Assets</p> 
        <canvas id="canvas3" height="80" width="80"></canvas> 
      </div>
      <div class="rankingbox4_divDash">
        <p class="categoryMood">Mood</p> 
        <canvas id="canvas4" height="80" width="80"></canvas>
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

    var options = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke : true,
      
      //String - The colour of each segment stroke
      segmentStrokeColor : "#fff",
      
      //Number - The width of each segment stroke
      segmentStrokeWidth : 2,
      
      //The percentage of the chart that we cut out of the middle.
      percentageInnerCutout : 66,
      
      //Boolean - Whether we should animate the chart 
      animation : true,
      
      //Number - Amount of animation steps
      animationSteps : 100,
      
      //String - Animation easing effect
      animationEasing : "easeOutQuart",
      
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate : true,

      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale : true,
      
      //Function - Will fire on animation completion.
      onAnimationComplete : null
    }


    var doughnutDataLove = [
        {
          value: 30,
          color:"#FF9999"
        },
        {
          value : 70,
          color : "#aaa"
        }
    ];

    var doughnutDataHealth = [
        {
          value: 60,
          color:"#00CC33"
        },
        {
          value : 40,
          color : "#aaa"
        }
    ];

    var doughnutDataAssets = [
        {
          value: 45,
          color:"#3399CC"
        },
        {
          value : 55,
          color : "#aaa"
        }
    ];

    var doughnutDataMood = [
        {
          value: 30,
          color:"#FFCC00"
        },
        {
          value : 70,
          color : "#aaa"
        }
    ];

    var myDoughnut1 = new Chart(document.getElementById("canvas1").getContext("2d")).Doughnut(doughnutDataLove, options);
    var myDoughnut2 = new Chart(document.getElementById("canvas2").getContext("2d")).Doughnut(doughnutDataHealth, options);
    var myDoughnut3 = new Chart(document.getElementById("canvas3").getContext("2d")).Doughnut(doughnutDataAssets, options);
    var myDoughnut4 = new Chart(document.getElementById("canvas4").getContext("2d")).Doughnut(doughnutDataMood, options);

  </script>
@stop