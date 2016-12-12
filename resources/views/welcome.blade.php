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

	{{-- @if (count($products) > 0)
	  @foreach ($products as $product)
	  	{{dd($product)}}
	    <div class="row product">
	      <div class="col-md-12">
	        <div class="clearfix content-heading">
	          <img class="pull-left col-md-3 img-responsive" src="/images/products/{{ $product->sku }}.jpg"/>
	          <h3>
	          {!! link_to_route('products.show', $product->name, [$product->id]) !!}
	          </h3>
	          <p>
	            <strong>${{ $product->price }}</strong><br />
	            {{ $product->description }}
	          </p>
	          <form action="/purchases" method="POST">
	            {{ csrf_field() }}
	            <script
	              src="https://checkout.stripe.com/checkout.js" class="stripe-button"
	              data-key="{{ config('services.stripe.key') }}"
	              data-amount="{{ $product->price }}"
	              data-name="MrWallsticker"
	              data-description="{{ $product->description }}"
	              data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
	              data-locale="auto"
	              data-zip-code="true"
	              data-currency="dkk">
	            </script>
	          </form>
	        </div>
	      </div>
	    </div>
	  @endforeach
  	@endif --}}
	@if (count($products) > 0)
		@foreach ($products as $product)
		  	<div class="product col-md-3">
		  		<div class="product__image">
		  			<img src="/images/products/test-4.jpg" class="img-responsive">
		  		</div>
		  		<span class="product__category">Test Kategori</span>
		  		<h3 class="product__title">{{ $product->name }}</h3>
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
