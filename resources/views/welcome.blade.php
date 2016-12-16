@extends('layouts.app')

@section('content')
	<div class="jumbotron banner col-md-12">
		<div class="col-md-6">
			<h1>Velkommen til MrWallsticker</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere aliquid aut illo voluptates, impedit eos illum recusandae magni. Alias explicabo, dolorum nisi saepe molestiae, debitis.</p>
			<a href="#">Se udvalget </a>
		</div>
	</div>

	<h2 class="text-align-center">Populære Produkter</h2>

	@if (count($products) > 0)
		@foreach ($products as $product)
		  	<div class="product col-md-3">
		  		<div class="product__image">
		  			<img src="/images/products/1481837810draw.jpg" class="img-responsive">
		  		</div>
		  		<span class="product__category">{{ $product->category->name }}</span>
		  		<h3 class="product__title"><a href="/products/{{$product->name}}">{{ $product->name }}</a></h3>
		  		<div class="rating">
		  			<img src="/images/icons/heart.svg" alt="">
		  			<img src="/images/icons/outlined-heart.svg" alt="">
		  			<img src="/images/icons/outlined-heart.svg" alt="">
		  			<img src="/images/icons/outlined-heart.svg" alt="">
		  			<img src="/images/icons/outlined-heart.svg" alt="">
		  			<div class="prices">
		  				<span class="old-price">{{ $product->price }}</span>
		  				<span class="discount-price">{{ $product->price }}</span>
		  			</div>
		  		</div>
		  	</div>
		@endforeach
	@endif
	
@endsection
