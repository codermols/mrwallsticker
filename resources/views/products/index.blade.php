@extends('layouts.app')

@section('content')
  <div class="jumbotron banner col-md-12">
    <div class="col-md-6">
      <h1>Velkommen til MrWallsticker</h1>
      <p>Vi leverer top kvalitets wallstickers til billige penge. Det er nemt og hurtigt. Du skal blot finde din wallsticker og trykke køb. Så lander wallstickeren i din postkasse 1-3 dage efter. Smart, ik?</p>
      <a href="{{ route('products.index') }}">Se udvalget </a>
    </div>
  </div>
  <div class="container-fluid">
<div class="row">
  <h2 class="text-align-center">Alle Produkter</h2>

  @if (count($products) > 0)
    @foreach ($products as $product)
        <div class="col-md-3 col-sm-12">
            <div class="product">
              @foreach ($product->photos as $photo)
                @if ($loop->first)
                  <img src="{{$photo->photoPath}}" class="img-responsive product__image">
                @endif
              @endforeach
              <span class="product__category">{{ $product->category->name }}</span>
              <h3 class="product__title"><a href="/products/{{$product->name}}">{{ $product->name }}</a></h3>
              <div class="rating">
                @if (count($reviews) > 0)
                  {{ ratingToStars($product->reviews->avg('rating')) }}
                @else
                  <p>Der er ingen anmeldelser.</p>
                @endif
                <div class="prices">
                  <span class="discount-price">{{ $product->price }}</span>
                </div>
              </div>
            </div>
        </div>
    @endforeach
  @endif
</div>
</div>
@endsection