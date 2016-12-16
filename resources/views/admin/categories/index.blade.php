@extends('layouts.app')

@section('content')

<h1>Kategorier</h1>

@if (count($category)>0)
	<ul>
	@foreach ($category as $cat)
		{{$cat->products}}
		<li>{{$cat->category_name}}</li>
	@endforeach
	</ul>
@endif




@endsection