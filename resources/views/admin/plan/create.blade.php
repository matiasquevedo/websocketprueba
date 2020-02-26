@extends('admin.template.main')

@section('title','Nuevo Plan')

@section('content')
<div class="bg-white px-3 py-3 border rounded">
	<h3>Nuevo Plan</h3>
	{!! Form::open(['route'=>'plan.store', 'method'=>'POST']) !!}

		<div class="form-group">
			{!! Form::label('title','Titulo') !!}
			{!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Titulo','required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('color','Color de Presentación') !!}
			{!! Form::color('color',null,['class'=>'form-control','placeholder'=>'Color de Presentación','required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('description','Descripción') !!}
			{!! Form::text('description',null,['class'=>'form-control','placeholder'=>'Descripción','required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('price','Precio') !!}
			{!! Form::text('price',null,['class'=>'form-control','placeholder'=>'Precio','required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('discount','Descuento') !!}
			{!! Form::text('discount','0',['class'=>'form-control','placeholder'=>'Descuento','required']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Crear',['class'=>'btn btn-primary']) !!}
		</div>



	{!! Form::close() !!}
</div>
@endsection