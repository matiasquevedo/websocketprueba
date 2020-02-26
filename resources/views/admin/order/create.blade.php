@extends('admin.template.main')

@section('title','Nuevo Pedido')

@section('content')
<ordersform-component :commerces="{{json_encode($commerces)}}"></ordersform-component>
@endsection