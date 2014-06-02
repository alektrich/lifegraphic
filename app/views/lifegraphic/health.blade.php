@extends('layouts.mainDash')

@section('content')
 
       
        <div class="healthbar_divDash">Health Bar</div>
        <button type="submit" class="submitButton">Submit values</button>
        <div class="historygraphbox_divDash">
          <div class="historygraphDash historygraphDashHealth">Your Health History</div>
          <canvas id="historyGraphCanvasHealth" width="280" height="150"></canvas>
        </div>
          <div class="subtitle_divDash"><strong>How Do you Feel Today?</strong>

             <div class="btn-group rateButtons">
              <button type="button" class="btn btn-success rateHealth"><span class="rate1">Very Bad</span></button>
              <button type="button" class="btn btn-success rateHealth"><span class="rate2">Bad</span></button>
              <button type="button" class="btn btn-success rateHealth"><span class="rate3">OK</span></button>
              <button type="button" class="btn btn-success rateHealth"><span class="rate4">Good</span></button>
              <button type="button" class="btn btn-success rateHealth"><span class="rate5">Very Good</span></button>
            </div>
          </div>
          
         
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p class="reasonLabel"><strong>Reason?</strong> 
            <button data-target="#addHealthReason" data-toggle="modal" class="btn btn-success btn-xs reasonButton"><i class="glyphicon glyphicon-plus"></i> Add New</button>
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
         

          <div class="modal fade" id="addHealthReason" tabindex="-1" role="dialog" aria-labelledby="addReasonLabel" aria-hidden="true">
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
                    {{Form::text('healthReason1', null, array('class' => 'form-control', 'placeholder' => 'Enter New Reason\'s name'))}}
                  </div>
                  <div class="input-group input-group-sm">
                    <span class="input-group-addon">2</span>  
                    {{Form::text('healthReason2', null, array('class' => 'form-control', 'placeholder' => 'Enter New Reason\'s name'))}}
                  </div>
                  <div class="input-group input-group-sm">
                    <span class="input-group-addon">3</span>  
                    {{Form::text('healthReason3', null, array('class' => 'form-control', 'placeholder' => 'Enter New Reason\'s name'))}}
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
