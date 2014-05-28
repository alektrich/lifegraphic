@extends('layouts.mainDash')

@section('content')
  
    <div class="TopsectionDash">
     <div class="Time_divDash">Time: 13:00</div>
      <div class="datestamp_divDash">Date: 01/01/2014</div>
      <div class="moodbar_divDash">Mood Bar</div>
     
      
      <div class="subtitle_divDash"><strong>How's your mood today?</strong>

         <div class="btn-group rateButtons">
              <button type="button" class="btn btn-warning rateMood">1</button>
              <button type="button" class="btn btn-warning rateMood">2</button>
              <button type="button" class="btn btn-warning rateMood">3</button>
              <button type="button" class="btn btn-warning rateMood">4</button>
              <button type="button" class="btn btn-warning rateMood">5</button>
          </div>
      </div>
      
    <div class="historygraphbox_divDash">
      <div class="historygraphDash historygraphDashMood">Your Mood History</div>
      <canvas id="historyGraphCanvasMood" width="280" height="150"></canvas>
    </div>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p class="reasonLabel"><strong>Reason?</strong> 
            <button data-target="#addMoodReason" data-toggle="modal" class="btn btn-success btn-xs reasonButton"><i class="glyphicon glyphicon-plus"></i> Add New</button>
            <!-- <button class="btn btn-danger btn-xs reasonButton"><i class="glyphicon glyphicon-minus"></i> Remove</button> -->
          </p>

          <div class="Reason_divDash">
            
            {{Form::open()}}
            <div class="control-group reasonCheckboxes">
                <div class="controls col-md-4">
                    <label class="checkbox">
                        <input type="checkbox" value="option1" id="inlineCheckbox1"> Headache
                    </label>
                    <label class="checkbox">
                        <input type="checkbox" value="option2" id="inlineCheckbox2"> Pain
                    </label>
                    <label class="checkbox">
                        <input type="checkbox" value="option3" id="inlineCheckbox3"> Sick
                    </label>

                </div>
                <div class="controls col-md-4">
                    <label class="checkbox">
                        <input type="checkbox" value="option1" id="inlineCheckbox1"> Awesome training
                    </label>
                    <label class="checkbox">
                        <input type="checkbox" value="option2" id="inlineCheckbox2"> High pressure
                    </label>

                    <label class="checkbox">
                        <input type="checkbox" value="option3" id="inlineCheckbox3"> Good sleep
                    </label>
                </div>
                <div class="controls col-md-4">
                    <label class="checkbox">
                        <input type="checkbox" value="option1" id="inlineCheckbox1"> Bad sleep
                    </label>
                    <label class="checkbox">
                        <input type="checkbox" value="option2" id="inlineCheckbox2"> Nervious
                    </label>
                    <label class="checkbox">
                        <input type="checkbox" value="option3" id="inlineCheckbox3"> Great food
                    </label>
                </div>
            </div>
            {{Form::close()}}
          </div>
         
          <div class="modal fade" id="addMoodReason" tabindex="-1" role="dialog" aria-labelledby="addReasonLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="addReasonLabel">Add New reasons</h4>
                </div>
                <div class="modal-body">
                  {{Form::open()}}
                  {{Form::label('Reason names')}}<br/>
                  <div class="input-group input-group-sm">
                    <span class="input-group-addon">1</span>
                    {{Form::text('moodReason1', null, array('class' => 'form-control', 'placeholder' => 'Enter New Reason\'s name'))}}
                  </div>
                  <div class="input-group input-group-sm">
                    <span class="input-group-addon">2</span>  
                    {{Form::text('moodReason2', null, array('class' => 'form-control', 'placeholder' => 'Enter New Reason\'s name'))}}
                  </div>
                  <div class="input-group input-group-sm">
                    <span class="input-group-addon">3</span>  
                    {{Form::text('moodReason3', null, array('class' => 'form-control', 'placeholder' => 'Enter New Reason\'s name'))}}
                  </div>  
                </div>
                <div class="modal-footer">
                  {{Form::submit('Add Reason', array('class' => 'btn btn-small btn-success'))}}
                  {{Form::close()}}
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->
@stop

@section('script')
  {{ HTML::script('js/graphics.js') }}
@stop