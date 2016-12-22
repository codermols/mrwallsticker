@extends('layouts.app')

@section('content')

<p>
    <a href="{{ URL::Route('admin.products.index') }}">&laquo; Tilbage til produkter</a>
</p>

<div class="col-xs-6">

    <h1>Rediger {{ $product->name }}</h1>

    {!! Form::model($product, ['route' => ['admin.products.update', $product->id], 'method' => 'put', 'class' => 'form', 'novalidate' => 'novalidate', 'files' => true]) !!}
        
        {!! Form::hidden('id') !!}

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                Der mangler følgende:<br />
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
     
    <div class="form-group">
        {!! Form::label('Produkt navn') !!}
        {!! Form::text('name', null, array('required', 'class'=>'form-control', 'placeholder'=>'List Name')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Produkt SKU') !!}
        {!! Form::text('sku', null, array('required', 'class'=>'form-control', 'placeholder'=>'mrw-1')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Pris') !!}
        <div class="input-group">
          <span class="input-group-addon">$</span>
        	{!! Form::text('price', null, array('required', 'class'=>'form-control', 'placeholder'=>'9.99')) !!}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('category_id', 'Vælg kategori') }}
        {{ Form::select('category_id', $categoryArray, null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {!! Form::label('Produktbeskrvelse') !!}
        {!! Form::textarea('description', null, array('class'=>'form-control', 'placeholder'=>'Skriv en produktbeskrivelse...')) !!}
    </div>
     
        {!! Form::submit('Rediger produktet!', array('class'=>'btn btn-primary')) !!}

    {!! Form::close() !!}
</div>

<div class="col-xs-6">
    <h2>Upload billeder til {{ $product->name }}</h2>
    <form action="/admin/products/{{$product->id}}/photos" class="dropzone" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
    </form>
    @foreach ($product->photos as $photo)
        
   
        @if(file_exists(public_path()."{$photo->photoPath}"))
          <img class="img-responsive" src="{{ $photo->photoPath }}" />
        @endif
    @endforeach

</div>

@endsection

@section('scripts.footer')
    <script src="/js/dropzone.js"></script>
@endsection
