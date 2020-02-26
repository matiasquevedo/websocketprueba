@extends('commerce.template.main')

@section('title',ucwords($commerce->name))

@section('content')
<div class="bg-white px-3 py-3 border rounded">
	<h3>Bienvenido {{$user->name}}!</h3>
	<ordersview-component commerce="{{$commerce->slug}}"></ordersview-component>

</div>
@endsection

