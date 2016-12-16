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
    <label for="category_name">Vælg en kategori</label>
    <select name="category_name" class="form-control">
        @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    {!! Form::label('description', 'Produkt Beskrivelse') !!}
    {!! Form::textarea('description', null, array('class'=>'form-control', 'placeholder'=>'Skriv en kort produkt beskrivelse')) !!}
</div>

{{-- <div class="form-group">
        {!! Form::label('photoPath', 'Produkt billede') !!}
        {!! Form::file('photoPath', null, array('required', 'class'=>'')) !!}
</div> --}}

{!! Form::submit('Opret Produkt!', array('class'=>'btn btn-primary')) !!}

{!! Form::close() !!}
</div>

{{-- <h2>Tilføj Billeder</h2> --}}

{{-- <form action="/admin/products/{{$this->get('id')}}/create/photos" method="post" class="form-group dropzone" enctype="multipart/form-data">
    {{ csrf_field() }}
{{--     {!! Form::label('photoPath', 'Produkt billede') !!}
    {!! Form::file('photoPath', null, array('required', 'class'=>'')) !!} --}}
{{-- </form>  --}}

{{-- <div class="col-md-6 well">
    <h3>Opret kategorier</h3>
    <form action="/admin/products/categories/create" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="category_name">Opret kategori</label>
            <input type="text" class="form-control" name="category_name" placeholder="Kategori...">
        </div>
        <button class="btn btn-primary btn-sm">Opret kategori</button>
    </form>
</div> --}}


@endsection

{{-- @section('scripts.footer')
    <script src="/js/dropzone.js"></script>
@endsection --}}
