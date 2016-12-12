@extends('layout.app')

@section('content')

<form method="post" action="/products/create/category">
	{{ csrf_field()) }}
	<div class="form-group">
		<label for="category_name">Indtast kategori</label>
		<input type="text" name="category_name" placeholder="Indtast en kategori" class="form-control"/>
	</div>
</form>

@if (count($categories) > 0)
	@foreach ($categories as $category)
		<ul>
			<li>{{ $category_name }}</li>
		</ul>

	@endforeach
@endif

@endsection