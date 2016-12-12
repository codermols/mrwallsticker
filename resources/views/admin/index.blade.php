@extends('layouts.app')

@section('content')

<h1>Backend</h1>
<ul>
	{{-- <li>{!! link_to_route('orders.index', 'Manage Orders') !!}</li> --}}
	<li>{!! link_to_route('products.index', 'Manage Products') !!}</li>
</ul>

@stop