@extends('layouts.mainDash')

@section('content')

<div class="col-md-5">
	
	{{ Form::text('date-filter', null, array('placeholder' => 'Filter by Date', 'class' => 'form-control', 'id' => 'datepicker')) }}
	{{-- Form::text('category-filter', null, array('placeholder' => 'Filter by Category', 'class' => 'form-control dropdown', 'id' => 'category-filter')) --}}
	
</div>

@if(!empty($submissionValues))
	<table  class="table table-bordered table-responsive submissions">
		<tr>
		  <th>Category</th>
		  <th>Date and Time</th>
		  <th style="padding-left: 25px;">Reasons</th>
		  <th>Value</th>
		</tr>
		<tbody>
			@foreach($submissionValues as $value)
				@if($value['category_id'] === 1)
				<tr class="danger">
					<td>Love</td>
				@elseif($value['category_id'] === 2)
				<tr class="success">
					<td>Health</td>
				@elseif($value['category_id'] === 3)
				<tr class="info">
					<td>Assets</td>
				@else
				<tr class="warning">
					<td>Mood</td>	
				@endif		
					<td>{{$value['date']}}</td>
					<td>
						<ul>
							@foreach($value['reasons'] as $reason)
							  <li>{{$reason}}</li>
							@endforeach  
						</ul>
					</td>
					<td>@if($value['value'] == 20) Very Bad @elseif($value['value'] == 40) Bad @elseif($value['value'] == 60) OK @elseif($value['value'] == 80) Good @else Very Good @endif</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else 
	<h3 style="margin-top: 60px;">No data submitted for any category.</h3>
@endif			
	<h2 class="submissions"><a href="{{URL::previous()}}">Go back</a></h2>
@stop

@section('script')

	<script type="text/javascript">

		$(document).ready(function() {

			$('input#datepicker').datepicker({

				todayBtn: "linked",

			});

			$('input#datepicker').change(function() {

				console.log( $( this ).val() );

				/*$.ajax({
					url: 
					data:
					type:
				});*/

			});

		});

	</script>

@stop
