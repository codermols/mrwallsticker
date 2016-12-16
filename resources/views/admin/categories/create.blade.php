@extends('layouts.app')

@section('content')

<h1>Opret kategorier</h1>
<p>Disse kategorier eksisterer allerede</p>
@if (count($category)> 0)
	<ul>
		@foreach ($category as $cat) 
				<li>{{ $cat->name }}</li>
		@endforeach
	</ul>
@endif
<form action="/admin/categories/create" method="post" class="col-md-6">
	{{ csrf_field() }}
	<div class="form-group">
		<label for="category_name">Opret kategori</label>
		<input type="text" class="form-control" name="category_name" placeholder="Opret din kategori her...">
	</div>
	<div class="form-group">
		<label for="slug">Opret slug til kategori</label>
		<input type="text" class="form-control" name="slug" placeholder="bornevaerlset">
	</div>
	<input type="submit" class="btn btn-default" value="Opret kategori">
</form>




@endsection