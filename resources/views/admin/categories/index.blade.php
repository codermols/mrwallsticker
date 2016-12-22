@extends('layouts.app')

@section('content')

<h1>Kategorier</h1>

@if (count($category) > 0)
	<ul>
	@foreach ($category as $cat)

		<li>{{$cat->name}}</li>
	@endforeach
	</ul>
@endif




@endsection