@extends('admin.template.main')

@section('title','Panel Administrador')

@section('content')
<div class="bg-white px-2 py-3 border rounded">
	<h3>Panel Administrador</h3>

	<div class="row">

		<div class="col-3">
			<div class="card border-left-primary shadow h-100 py-2">
			  <div class="card-body">
			    <div class="row no-gutters align-items-center">
			      <div class="col mr-2">
			        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">  </div>
			        <div class="h5 mb-0 font-weight-bold text-gray-800">{{count(\App\User::all())}}</div>
			      </div>
			      <div class="col-auto">
			        <i class="fas fa-users fa-2x text-gray-300"></i>
			      </div>
			    </div>
			  </div>
			</div>
		</div>
		<div class="col-3">
			<div class="card border-left-warning shadow h-100 py-2">
			  <div class="card-body">
			    <div class="row no-gutters align-items-center">
			      <div class="col mr-2">
			        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">  </div>
			        <div class="h5 mb-0 font-weight-bold text-gray-800">{{count(\App\Commerce::all())}}</div>
			      </div>
			      <div class="col-auto">
			        <i class="fas fa-store-alt fa-2x text-gray-300"></i>
			      </div>
			    </div>
			  </div>
			</div>
		</div>
		<div class="col-3">
			<div class="card border-left-info shadow h-100 py-2">
			  <div class="card-body">
			    <div class="row no-gutters align-items-center">
			      <div class="col mr-2">
			        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">  </div>
			        <div class="h5 mb-0 font-weight-bold text-gray-800">{{count(\App\Product::all())}}</div>
			      </div>
			      <div class="col-auto">
			        <i class="fas fa-apple-alt fa-2x text-gray-300"></i>
			      </div>
			    </div>
			  </div>
			</div>
		</div>
	</div>



	
</div>

<div class="row mt-2 px-">
	<div class="col-6 col-md-6" >
		<div class="card shadow mb-4">
		  <!-- Card Header - Dropdown -->
		  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		    <h6 class="m-0 font-weight-bold text-primary"><a href="{{route('plan.index')}}">Planes</a></h6>
		    <div class="dropdown no-arrow">
		      <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
		      </a>
		      <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
		        <a class="dropdown-item" href="{{route('plan.create')}}">Nuevo Plan</a>{{-- 
		        <a class="dropdown-item" href="#">Another action</a>
		        <div class="dropdown-divider"></div> --}}
		      </div>
		    </div>
		  </div>
		  <!-- Card Body -->
		  <div class="card-body">
		    <table class="table">{{-- 
		      <thead>
		        <tr>
		        	<th scope="col"></th>
		          <th scope="col">Titulo</th>
		          <th scope="col">Precio</th>
		          <th scope="col">Descuento</th>
		          <th></th>
		        </tr>
		      </thead> --}}
		      <tbody>
		      	@foreach($plans as $plan)
		        <tr>
		        	<td><span class="badge rounded-circle" style="background-color: {{$plan->color}};color: {{$plan->color}};">a</span></td>
		          <td>{{$plan->title}}</td>
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
		  </div>
		</div>
	</div>
	<div class="col-6 col-md-6">
		{{-- <div class="card shadow mb-4">
		  <!-- Card Header - Dropdown -->
		  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		    <h6 class="m-0 font-weight-bold text-primary">Dropdown Card Example</h6>
		    <div class="dropdown no-arrow">
		      <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
		      </a>
		      <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
		        <div class="dropdown-header">Dropdown Header:</div>
		        <a class="dropdown-item" href="#">Action</a>
		        <a class="dropdown-item" href="#">Another action</a>
		        <div class="dropdown-divider"></div>
		        <a class="dropdown-item" href="#">Something else here</a>
		      </div>
		    </div>
		  </div>
		  <!-- Card Body -->
		  <div class="card-body">
		    Dropdown menus can be placed in the card header in order to extend the functionality of a basic card. In this dropdown card example, the Font Awesome vertical ellipsis icon in the card header can be clicked on in order to toggle a dropdown menu.
		  </div>
		</div> --}}
	</div>
</div>

@endsection

@section('js')
<script>
  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
    console.log("no se que onda");
  });
</script>
@endsection