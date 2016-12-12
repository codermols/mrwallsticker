@extends('layouts.app')

@section('content')
<div class="col-md-6">

<h1>Opret nyt produkt</h1>


{!! Form::open(array('route' => 'products.store', 'class' => 'form', 'novalidate' => 'novalidate', 'files' => true)) !!}
    
@if (count($errors) > 0)
	<div class="alert alert-danger">
		Der var nogle problemer med dine inputs.<br />
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif
 
<div class="form-group">
    {!! Form::label('name', 'Produkt navn') !!}
    {!! Form::text('name', null, array('required', 'class'=>'form-control', 'placeholder'=>'Produkt navn')) !!}
</div>

<div class="form-group">
    {!! Form::label('sku', 'Produkt SKU') !!}
    {!! Form::text('sku', null, array('required', 'class'=>'form-control', 'placeholder'=>'TEST-1234')) !!}
</div>

<div class="form-group">
    {!! Form::label('price', 'Pris') !!}
    <div class="input-group">
      <span class="input-group-addon">$</span>
    	{!! Form::text('price', null, array('required', 'class'=>'form-control', 'placeholder'=>'149')) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('description', 'Produkt Beskrivelse') !!}
    {!! Form::textarea('description', null, array('class'=>'form-control', 'placeholder'=>'Skriv en kort produkt beskrivelse')) !!}
</div>

<div class="form-group">
    {!! Form::label('category_name', 'Produkt kategori') !!}
    {!! Form::textarea('category_name', null, array('class'=>'form-control', 'placeholder'=>'Opret ny kategori')) !!}
</div>
 
{!! Form::submit('Opret Produkt!', array('class'=>'btn btn-primary')) !!}

{!! Form::close() !!}
</div>
<form action="/admin/products/create/photos" method="post" class="dropzone col-md-6">
    {{ csrf_field() }}
{{--     {!! Form::label('image', 'Produkt billede') !!}
    {!! Form::file('image', null, array('required', 'class'=>'')) !!} --}}
</form>
@endsection

@section('scripts.footer')
    <script src="/js/dropzone.js"></script>
@endsection
