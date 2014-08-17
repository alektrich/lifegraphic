@extends('layouts.mainDash')

@section('content')

@foreach($submissionValues as $value)
	<h1>Category: @if($value['category_id'] === 1) Love @elseif($value['category_id'] === 2) Health @elseif($value['category_id'] === 3) Assets @else Mood @endif</h1>
	<h1>Date: {{$value['date']}}</h1>
	<h1>Reasons:</h1>
	@foreach($value['reasons'] as $reason)
	  <h2>{{$reason}}</h2>
	@endforeach  
	<h1>Value: {{$value['value']}}</h1>
@endforeach	

@stop
