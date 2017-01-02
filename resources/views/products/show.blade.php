@extends('layouts.app')

@section('content')

<div class="product-show col-md-12">
	
	<div class="col-md-4">
		
		<div class="product-slider">
			
			@foreach ($product->photos as $photo)
			  <div><img class="img-responsive" src="{{$photo->photoPath}}" /></div>
		  	@endforeach

		</div>
		
	</div>

	<div class="col-md-8">
		<span class="product-show__category">{{$product->category->name}}</span>
		<h1 class="product-show__name">{{$product->name}}</h1>
		
		<div class="product-show__rating">
			@if (count($reviews) > 0)
				{{ ratingToStars($product->reviews->avg('rating')) }}
			@else
				<p>Der er ingen anmeldelser.</p>
			@endif
		</div>

		<div class="product-show__price">
		{{-- {!! Form::open(['url' => '/cart/store']) !!} --}}
			<span>{{$product->price}},-</span>
			<div class="product-show__action">
				{{-- <input type="hidden" name="product_id" value="{{ $product->id }}"/> --}}
				{{-- <button type="submit" class="btn btn-primary btn-lg">Læg i kurv</button> --}}
				<a href="{{ route('product.addToCart', ['id' => $product->id])  }}" class="btn btn-primary btn-lg">Læg i kurv</a>
				<button class="like btn btn-lg btn-default" type="button">
					<span class="fa fa-heart"></span>
				</button>
		{{-- {!! Form::close() !!} --}}

				{{-- <button class="add-to-cart btn btn-default" type="button">add to cart</button> --}}
			</div>
		</div>
	</div>
</div>

<div class="product-description">
	<h5>Produkt beskrivelse</h5>
	<p>{{$product->description}}</p>	
</div>

<div class="row">
	<h2 class="text-align-center">Relaterede produkter</h2>
	@foreach ($relatedProducts as $relatedProduct)
		@if ($product->id !== $relatedProduct->id)
		  	<div class="col-md-3">
		  		<div class="product">
		  		@foreach ($relatedProduct->photos as $photo)
		  		<div class="product__image">
		  			@if ($loop->first)
	  					<img src="{{$photo->photoPath}}" class="img-responsive product__image">
		  			@endif
		  		</div>
				@endforeach
		  		<span class="product__category">{{ $relatedProduct->category->name }}</span>
		  		<h3 class="product__title">
		  			<a href="/products/{{$relatedProduct->name}}">{{ $relatedProduct->name }}</a>
  				</h3>
		  		<div class="rating">
		  			@if (count($reviews) > 0)
		  			  {{ ratingToStars($relatedProduct->reviews->avg('rating')) }}
		  			@else
		  			  <p>Der er ingen anmeldelser.</p>
		  			@endif
		  			<div class="prices">        
		  				<span class="discount-price">{{ $relatedProduct->price }}</span>
		  			</div>
		  		</div>
		  		</div>
		  	</div>
	  	@endif
	@endforeach
</div>

<div class="row">
	<h3 class="text-align-center">Anmeldelser</h3>
	<div class="col-md-6">
		<div class="review">
		    @foreach ($reviews as $review)
		    	@if (count($review) > 0)
					<small>{{$review->name}}</small>
					<small class="pull-right">Skrevet d. {{ $review->created_at }}</small>

					{{ratingToStars($review->rating)}}	

					<h3>{{$review->title}}</h3>
					<p>{{$review->review}}</p>
				@endif

			@endforeach

			<h4 class="text-align-center">
				Opret din anmeldelse
			</h4>
			<form action="/products/{{$product->id}}/reviews/create" method="post">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="review_title">Overskrift</label>
						<input type="text" name="review_title" class="form-control" />
					</div>
					<div class="form-group">
						<label for="review_title">Skriv om produktet her</label>
						<textarea name="review_content" class="form-control">Skriv din anmeldelse her....</textarea>
					</div>
					<div class="form-group">
					<label for="review_rating">Vælg mellem 1-5, hvor 1 er ringest og 5 er højest</label>
						<select name="review_rating" class="form-control">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select>
					</div>
					<button type="submit" class="btn btn-primary btn-lg">Opret anmeldelse</button>
				</form>
		</div>
	</div>
</div>

@endsection

@section('scripts.footer')

	<script>
		$(document).ready(function(){
		  $('.product-slider').slick({
		  	dots: true,
		  	infinite: true,
		  	speed: 300,
		  	slidesToShow: 1,
		  	adaptiveHeight: true
		  });
		});
	</script>

@endsection