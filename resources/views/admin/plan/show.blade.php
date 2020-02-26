@extends('admin.template.main')

@section('title','Plan: '.$plan->title)

@section('content')
<div class="bg-white px-3 py-3 border rounded">
	<h3>Plan: {{$plan->title}} <span class="badge rounded-circle" style="background-color: {{$plan->color}};color: {{$plan->color}};">a</span> </h3>
</div>
@endsection