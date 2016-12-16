@extends('layouts.app')

@section('content')

{{-- <img class="pull-left product-img" src="/images/products/{{ $product->sku }}.jpg"/> --}}

<h1>{{ $product->name }}</h1>

{!! Form::open(array('url' => '/checkout')) !!}
{!! Form::hidden('product_id', $product->id) !!}
<script
src="https://checkout.stripe.com/checkout.js" class="stripe-button"
data-key="{{ config('services.stripe.key') }}"
data-name="WeDewLawns.com"
data-billingAddress=true
data-shippingAddress=true
data-label="Køb ${{ $product->price }}"
data-description="{{ $product->name }}"
data-amount="{{ $product->price }}">
</script>
{!! Form::close() !!}

<br />

{!! Form::open(['url' => '/cart/store']) !!}
<input type="hidden" name="product_id" value="{{ $product->id }}"/>
<button type="submit" class="btn btn-primary">Tilføj til din kurv</button>
{!! Form::close() !!}

<p>
{{ $product->description }}
</p>

@endsection