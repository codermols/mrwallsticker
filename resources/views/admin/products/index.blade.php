@extends('layouts.app')

@section('content')

<h1>Dine produkter</h1>

  @if (count($products) > 0)
    <p>
      <a href="{{ URL::Route('admin.products.create') }}" class="btn btn-success">Opret et produkt</a>
    </p>

    <table class="table table-striped">
      <thead>
        <tr>
          <th>Navn</th>
          <th>Pris</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $product)
          <tr>
            <td>
              <a href="{{ URL::route('admin.products.edit', $product->id) }}">{{ $product->name }}</a>
            </td>
            <td>
              {{ $product->price }} DKK
            </td>
            <td>
              {!! Form::open(array('route' => array('admin.products.destroy', $product->id), 'method' => 'delete')) !!}
              <button type="submit" class="btn btn-success" href="{{ URL::route('admin.products.destroy', $product->id) }}" title="Slet Produkt">
              Slet
              </button>
              {!! Form::close() !!}
              {!! Form::open(array('route' => array('admin.products.edit', $product->id), 'method' => 'get')) !!}
              <button type="submit" class="btn btn-warning" href="{{ URL::route('admin.products.update', $product->id) }}" title="Opdater Produkt">
              Rediger
              </button>
              {!! Form::close() !!}
              {!! Form::open(array('route' => array('products.show', $product->name), 'method' => 'get')) !!}
              <button type="submit" class="btn btn-warning" href="{{ URL::route('admin.products.show', $product->id) }}" title="Vis Produkt">
              Vis
              </button>
              {!! Form::close() !!}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <p>
     Du har endnu ikke oprettet et produkt. <a href="/admin/products/create">Opret produkt</a>
    </p>
  @endif

@endsection