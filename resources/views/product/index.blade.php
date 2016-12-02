@extends('layouts.app')

@section('content')

<h1>Alle produkter</h1>

@if (count($products) > 0)
  @foreach ($products as $product)
    <div class="row product">
      <div class="span4">
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
@else
  <p>The product catalog is currently offline.</p>
@endif

@endsection