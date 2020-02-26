@extends('admin.template.main')

@section('title','Lista de Planes')

@section('content')
<div class="bg-white px-3 py-3 border rounded">
	<h3>Lista de Planes</h3>
	<div>
		  <table class="table table-striped">
		  <thead>
		    <tr>
		    	<th></th>
		      <th>Nombre</th>
		      <th>Precio</th>
		      <th>Descuento</th>
		      <th>Acción</th>
		    </tr>
		  </thead>
		  <tbody>
		    @foreach($plans as $plan)
		    <tr>
		      	<td><span class="badge" style="background-color: {{$plan->color}};color: {{$plan->color}};">aa</span></td>
		        <td><a href="{{route('plan.show',$plan->slug)}}">{{$plan->title}}</a></td>
		        <td>{{$plan->price}}</td>
		        <td>{{$plan->discount}}</td>
		      <td>
		        <a href="{{ route('plan.edit', $plan->slug) }}" class="btn btn-warning"><span class="fas fa-wrench"></span></a>
		        <a href="{{ route('plan.destroy', $plan->slug) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
		      </td>
		    </tr>


		    @endforeach
		  
		  </tbody>
		</table>
		{!! $plans->render() !!}  
	</div>
</div>
@endsection