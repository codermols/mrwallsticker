@extends('layouts.app')

@section('content')

<a href="/prodcuts">Shop videre</a>

<div class="shop-wrap">
	<h1>Betaling</h1>

	<h2>1 | Indkøbskurv</h2>
	<h2> | Betaling</h2>
	<h2>3 | Kvittering</h2>
	<div class="row">
		<form action="/cart/complete" class="form" id="purchase-form">
			<div class="form-group">
				<label for="card_name">Navn på betalingskort</label>
				<input type="text" class="form-control" name="card_name" id="card_name" value="{{ Auth::user()->name}}">
			</div>
			<div class="form-group">
				<label for="address">Adresse</label>
				<input type="text" class="form-control" name="address" id="address" placeholder="Adresse">
			</div>
			<div class="form-group">
				<label for="city">By</label>
				<input type="text" class="form-control" name="city" id="city" placeholder="By">
			</div>
			<div class="form-group">
				<label for="state">Region</label>
				<input type="text" class="form-control" name="state" id="state" placeholder="Region">
			</div>
			<div class="form-group">
				<label for="zip">Postnummer</label>
				<input type="text" class="form-control" name="zip" id="zip">
			</div>
			<div class="form-group">
				<label for="country">Land</label>
				<input type="text" class="form-control" name="country" id="country" placeholder="country">
			</div>
	</div>
	<div class="row">
		<h3>Forsendelsesmetode</h3>
		<div class="form-group">
			<label for="shipping_address">Adresse</label>'
			<input type="text" class="form-control" name="shipping_address" id="shipping_address" placeholder="Adresse">
		</div>
		<div class="form-group">
			<label for="shipping_city">By</label>'
			<input type="text" class="form-control" name="shipping_city" id="shipping_city" placeholder="city">
		</div>
		<div class="form-group">
			<label for="shipping_state">Region</label>'
			<input type="text" class="form-control" name="shipping_state" id="shipping_state" placeholder="state">
		</div>
		<div class="form-group">
			<label for="shipping_zip">Postnummer</label>'
			<input type="text" class="form-control" name="shipping_zip" id="shipping_zip" placeholder="zip">
		</div>
		<div class="form-group">
			<label for="shipping_country">Land</label>'
			<input type="text" class="form-control" name="shipping_country" id="shipping_country" placeholder="country">
		</div>
		<div class="form-group">
			<label for="card_number">Kreditkortnummer</label>
			<input type="text" class="form-control" name="card_number" id="card_number" placeholder="**** **** **** ****" required autofous data-stripe="number" value="{{ Auth::environment() == 'local' ? '4242424242424242' : '' }}">
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-xs-4">
					<label for="card_month"></label>
				</div>
				<div class="col-xs-8">
					<label for="card_cvc"></label>
				</div>
			</div>
			<div class="row">
				<input type="text" size="3"
                               class="form-control"
                               name="exp_month"
                               data-stripe="exp_month"
                               placeholder="MM"
                               id="card_month"
                               value="{{ App::environment() == 'local' ? '12' : '' }}"
                               required>
               <input type="text" size="4"
                      class="form-control"
                      name="exp_year"
                      data-stripe="exp-year"
                      placeholder="YYYY"
                      id="card-year"
                      value="{{ App::environment() == 'local' ? '2016' : '' }}"
                      required>
              	<input type="text"
              	       class="form-control"
              	       id="card-cvc"
              	       placeholder=""
              	       size="6"
              	       value="{{ App::environment() == 'local' ? '111' : '' }}">
			</div>

		</div>
	</div>
	<a href="/cart"><button class="btn btn-default btn-lg">Gå tilbage</button></a>
	<button type="submit" class="submit-button btn btn-primary btn-lg">Betal nu</button>
	</form>
</div>

@stop