@extends('layouts.mainDash')

@section('content')

@if(!empty($submissionValues))
	<table  class="submissions" border="1">
		<tr>
		  <th>Category</th>
		  <th>Date</th>
		  <th style="padding-left: 25px;">Reasons</th>
		  <th>Value</th>
		</tr>
		<tbody>
			@foreach($submissionValues as $value)
				<tr>
					<td>@if($value['category_id'] === 1) Love @elseif($value['category_id'] === 2) Health @elseif($value['category_id'] === 3) Assets @else Mood @endif</td>
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
	<h2><a href="{{URL::to('/')}}">Go back</a></h2>
@else 
	<h2>No data submitted for this category. <a href="{{URL::to('/')}}">Go back</a></h2>
@endif			

@stop