@extends('layouts.app')

@section('content')

<h1>Dashboard</h1>
<ul>
	{{-- <li>{!! link_to_route('orders.index', 'Manage Orders') !!}</li> --}}
	<li>{!! link_to_route('products.index', 'Produkter') !!}</li>
	<li><a href="{{ url('admin/categories/create') }}">Kategorier</a></li>
</ul>

@stop