@extend('layouts.app')

@section('content')

<h1>{{ $product->name }}</h1>
<p>{{ $product->description }}</p>

@stop