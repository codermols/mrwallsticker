@extends('layouts.app')

@section('content')
	<div class="jumbotron banner col-md-12">
		<div class="col-md-6">
			<h1>Velkommen til MrWallsticker</h1>
			<p>Vi leverer top kvalitets wallstickers til billige penge. Det er nemt og hurtigt. Du skal blot finde din wallsticker og trykke køb. Så lander wallstickeren i din postkasse 1-3 dage efter. Smart, ik?</p>
			<a href="{{ route('products.index') }}">Se udvalget </a>
		</div>
	</div>

	<div class="row">

		<h2 class="text-align-center">WALLSTICKERS - Alt fra wallstickers til børneværelset til herreværelset</h2>

		<p class="text-align-center">Wallstickers er hurtigt blevet en populær trend og hos MrWallsticker tror vi på, at wallstickers er kommet for at blive. Her på siden sælger vi wallstickers, der er designet og fremstillet af os selv. På denne måde kan vi sikre dig produkter, der altid er af højeste kvalitet, fordi vi selv kan vælge den bedste produktionsmetode til hver enkelt wallstickers. Samtidig kan vi til alle tider sikre dig en kundeservice, der er i top. Vores udvalg er kæmpe stort og vi har mange forskellige designs, masser af flotte farver og du har endda mulighed for at designe din egen wallsticker, så du får den perfekte wallsticker til dit hjem.
		MrWallsticker I ABSOLUT HØJESTE KVALITET</p>


	</div>
	<h2 class="text-align-center">Populære Produkter</h2>

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
	
@endsection
