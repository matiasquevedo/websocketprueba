@extends('admin.template.main')

@section('title','Lista de Usuarios')

@section('content')
<div class="bg-white px-3 py-3 border rounded">
	<h3>Lista de Usuarios</h3>
	<div>
		  <table class="table table-striped">
		  <thead>
		    <tr>
		      <th>Nombre</th>
		      <th>Apellido</th>
		      <th>Tipo</th>
		      <th>Comercio</th>
		      <th>Acción</th>
		    </tr>
		  </thead>
		  <tbody>
		    @foreach($users as $user)
		    <tr>
		        <td>{{$user->name}}</td>
		        <td>{{$user->lastname}}</td>
		        <td>{{$user->type}}</td>
		        <td>
		        	@if($user->type == 'admin')
		        		<span class="badge badge-success">Administrador</span>
		        	@elseif($user->commerce != null)
						{{$user->commerce->name}}
		        	@else
						Sin Comercio
		        	@endif
		        </td>
		      <td>
		        <a href="{{ route('user.edit', $user->email) }}" class="btn btn-warning"><span class="fas fa-wrench"></span></a>
		        <a href="{{ route('user.destroy', $user->email) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
		      </td>
		    </tr>


		    @endforeach
		  
		  </tbody>
		</table>
		{!! $users->render() !!} 
	</div>
</div>
@endsection