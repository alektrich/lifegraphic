@extends('layouts.mainDash')

@section('content')
  

      <div class="moodbar_divDash">Mood Bar</div>
     
      <button type="submit" class="submitButton"></button>
      <div class="subtitle_divDash"><strong>How's your mood today?</strong>

         <div class="btn-group rateButtons">
              <button type="button" class="btn btn-warning rateMood rateValue1"><span class="rate1">Very Bad</span></button>
              <button type="button" class="btn btn-warning rateMood rateValue2"><span class="rate2">Bad</span></button>
              <button type="button" class="btn btn-warning rateMood rateValue3"><span class="rate3">OK</span></button>
              <button type="button" class="btn btn-warning rateMood rateValue4"><span class="rate4">Good</span></button>
              <button type="button" class="btn btn-warning rateMood rateValue5"><span class="rate5">Very Good</span></button>
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
            <button data-target="#addMoodReason" data-toggle="modal" class="btn btn-info btn-xs reasonButton"><i class="glyphicon glyphicon-plus"></i> Add New</button>
            <button data-target="#viewMoodReasons" data-toggle="modal" class="btn btn-success btn-xs reasonButton"><i class="glyphicon glyphicon-eye"></i> View Reasons</button>
          </p>

          <div class="Reason_divDash">
            
            {{Form::open(array('url' => 'mood', 'method' => 'POST', 'class' => 'categoryForm'))}}
            {{Form::hidden('moodValue', null, array('class' => 'catValue'))}}
            <div class="control-group reasonCheckboxes">
                <div class="controls col-md-4">
                    <label class="checkbox">
                        {{Form::checkbox('reasons[]', 'happy')}} Happy
                    </label>
                    <label class="checkbox">
                        {{Form::checkbox('reasons[]', 'sad')}} Sad
                    </label>
                </div>
                <div class="controls col-md-4">
                    <label class="checkbox">
                        {{Form::checkbox('reasons[]', 'excited')}} Excited
                    </label>
                    <label class="checkbox">
                        {{Form::checkbox('reasons[]', 'depressed')}} Depressed
                    </label>

                </div>
                <div class="controls col-md-4">
                    <label class="checkbox">
                        {{Form::checkbox('reasons[]', 'stressed')}} Stressed
                    </label>
                    <label class="checkbox">
                        {{Form::checkbox('reasons[]', 'relaxed')}} Relaxed
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
                  {{Form::open(array('url' => 'reason/mood/new'))}}
                  {{Form::label('Reason names')}}<br/>
                  <div class="input-group input-group-sm">
                    <span class="input-group-addon">New</span>
                    {{Form::text('reason', null, array('class' => 'form-control', 'placeholder' => 'Enter Reason\'s name'))}}
                    {{Form::hidden('category', 'mood')}}
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

          <div class="modal fade" id="viewMoodReasons" tabindex="-1" role="dialog" aria-labelledby="viewReasonsLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="viewReasonsLabel">Your Mood Reasons:</h4>
                </div>
                <div class="modal-body">
                  @if(empty($reasons))
                  <p>No reasons chosen ...</p>
                  @else
                  <ul>
                    @foreach($reasons as $reason)
                      <li>{{$reason}}</li>
                    @endforeach
                  </ul> 
                  @endif
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->
@stop
