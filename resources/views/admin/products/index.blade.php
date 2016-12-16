@extends('layouts.app')

@section('content')

<h1>Dine produkter</h1>

  @if (count($products) > 0)
    <p>
      <a href="{{ URL::Route('products.create') }}" class="btn btn-success">Opret et produkt</a>
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
              <a href="{{ URL::route('products.edit', $product->id) }}">{{ $product->name }}</a>
            </td>
            <td>
              {{ $product->price }} DKK
            </td>
            <td>
              {!! Form::open(array('route' => array('products.destroy', $product->id), 'method' => 'delete')) !!}
              <button type="submit" class="btn btn-success" href="{{ URL::route('products.destroy', $product->id) }}" title="Slet Produkt">
              Slet
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