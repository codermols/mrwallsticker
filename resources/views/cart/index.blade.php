@extends('layouts.app')

@section('content')
    <div class="row">
    <h1>Cart</h1>

    @if (count($cart) == 0)
        <p>Your cart is currently empty</p>
    @else
        <table class="table table-border">
            <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($cart as $item)
                <tr>
                <td><a href="/cart/remove/{{ $item->id }}">x</a></td>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->product->price }} DKK</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <hr/>
        <div class="container">
	        <div class="col-sm-12 col-md-12">
	            <div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : ''  }}">
	                {{ Session::get('error') }}
	            </div>
            </div>
            <div class="col-sm-12 col-md-12">
	            <form action="{{ route('cart.complete') }}" method="post" id="checkout-form">
	            	<div class="col-sm-3 col-md-3">
	            	<h3>Forsendelsinformationer</h3>
	            		<div class="form-group">
	            			<label for="shipping_name">Fulde Navn</label>
	            			<input type="text" class="form-control" id="shipping_name" name="shipping_name" value="{{ Auth::user()->name }}" required>
	            		</div>
	            		<div class="form-group">
	            			<label for="shipping_address">Adresse</label>
	            			<input type="text" class="form-control" name="shipping_address" id="shipping_address" required>
	            		</div>
	            		<div class="col-sm-6 col-md-6">
		            		<div class="row">
			            		<div class="form-group">
			            			<label for="shipping_city">By</label>
			            			<input type="text" class="form-control" id="shipping_city" name="shipping_city" required>
		            			</div>
	            			</div>
            			</div>
            			<div class="col-sm-6 col-md-6" style="padding-right: 0;">
            			
            			<div class="form-group">
	            			<label for="shipping_zip">Postnummer</label>
	            			<input type="text" class="form-control" id="shipping_zip" name="shipping_zip" required>
	            		</div>
	            		
	            		</div>
	            	</div>
	            	<div class="col-sm-3 col-md-3 col-sm-offset-2 col-md-offset-2">
	            	<h3>Betalingsinformationer</h3>
	            		<div class="form-group">
	            			<label for="card_name">Kortholderens navn</label>
	            			<input type="text" class="form-control" id="card_name" name="card_name" value="{{ Auth::user()->name }}" required>
	            		</div>
	            		<div class="form-group">
	            			<label for="card-name">Kortnummer</label>
	            			<input type="text" class="form-control" id="card-number" required>
	            		</div>
	            		<div class="col-sm-6 col-md-6">
		            		<div class="row">
			            		<div class="form-group">
			            			<label for="card-expiry-month">Exp. måned</label>
			            			<input type="text" class="form-control" id="card-expiry-month" required>
		            			</div>
	            			</div>
            			</div>
            			<div class="col-sm-6 col-md-6" style="padding-right: 0;">
	            			<div class="form-group">
		            			<label for="card-expiry-year">Exp. år</label>
		            			<input type="text" class="form-control" id="card-expiry-year" required>
		            		</div>
	            		</div>
	            		<div class="row col-sm-6 col-md-6">
	            			<div class="form-group">
		            			<label for="card-cvc">CVC</label>
		            			<input type="text" class="form-control" id="card-cvc" required>
		            		</div>
	            		</div>
	            	</div>

			        
		            {{ csrf_field() }}
	            	
	            <button type="submit" class="btn btn-primary btn-lg pull-right">Betal nu</button>
		            
		        </form>
	            <a href="{{ route('products.index') }}"><button class="btn btn-default btn-lg pull-left">Shop videre</button></a>
	        </div>	
        </div>
    </div>
    @endif
@endsection


@section('scripts.footer')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script>

        Stripe.setPublishableKey("pk_test_F9cE9sgu3jZMUXHCeMV1EctW");

        var $form = $('#checkout-form');

        $form.submit(function(event) {
            $('#charge-error').addClass('hidden');
            $form.find('button').prop('disabled', true);
            Stripe.card.createToken({
                number: $('#card-number').val(),
                cvc: $('#card-cvc').val(),
                exp_month: $('#card-expiry-month').val(),
                exp_year: $('#card-expiry-year').val(),
                name: $('#card-name').val()
            }, stripeResponseHandler);
            return false;
        });

        function stripeResponseHandler(status, response) {
        	
            if (response.error) {
                $('#charge-error').removeClass('hidden');
                $('#charge-error').text(response.error.message);
                $form.find('button').prop('disabled', false);
            } else {
                var token = response.id;
                $form.append($('<input type="hidden" name="stripeToken" />').val(token));

                // Submit the form:
                $form.get(0).submit();
                
            }
        }
    </script>
@endsection