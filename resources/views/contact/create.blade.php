@extends('layouts.app')

@section('content')

<h1>Kontakt MrWallsticker</h1>

@if (count($errors) > 0)
	<div class="alert alert-danger">
		Ret følgende fejl: <br>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

{!! Form::open(['method' => 'POST', 'route' => 'contact_store', 'class' => 'form-horizontal']) !!}

    <div class="form-group{{ $errors->has('inputName') ? ' has-error' : '' }}">
        {!! Form::label('inputName', 'Dit Navn') !!}
        {!! Form::text('inputName', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Dit Navn']) !!}
        <small class="text-danger">{{ $errors->first('inputName') }}</small>
    </div>

    <div class="form-group{{ $errors->has('inputEmail') ? ' has-error' : '' }}">
        {!! Form::label('inputEmail', 'Din Email') !!}
        {!! Form::text('inputEmail', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'eksempel@mail.dk']) !!}
        <small class="text-danger">{{ $errors->first('inputEmail') }}</small>
    </div>

	<div class="form-group{{ $errors->has('inputMessage') ? ' has-error' : '' }}">
	    {!! Form::label('inputMessage', 'Din Besked') !!}
	    {!! Form::textarea('inputMessage', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Skriv din besked her']) !!}
	    <small class="text-danger">{{ $errors->first('inputMessage') }}</small>
	</div>

    <div class="btn-group pull-right">
        {!! Form::reset("Reset", ['class' => 'btn btn-warning']) !!}
        {!! Form::submit("Kontkakt os!", ['class' => 'btn btn-success']) !!}
    </div>

{!! Form::close() !!}

@endsection