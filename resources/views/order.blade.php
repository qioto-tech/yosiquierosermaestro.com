@extends('layouts.template')

@section('title', 'Pagos')

@section('script')
@endsection



@section('sub-title', 'Generar orden de pedido')


@section('content')

@include('order.partials.errors')


{!! Form::open(['route' => 'order.store', 'method' => 'POST', 'class'=>'form-horizontal']) !!}

  <div class="form-group">
    <label class="control-label col-sm-2" for="customer_ci">Cedula:</label>
    <div class="col-sm-10">
      {!! Form::text('customer_ci',null,['class'=>'form-control', 'placeholder'=>'Introduce el numero de cedula','size'=>'60', 'id'=>'customer_ci', 'name'=>'customer_ci']) !!}
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="customer_name">Nombre:</label>
    <div class="col-sm-10">
      {!! Form::text('customer_name',null,['class'=>'form-control', 'placeholder'=>'Introduce tu nombre','size'=>'60', 'id'=>'customer_name', 'name'=>'customer_name']) !!}
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="customer_lastname">Apellido:</label>
    <div class="col-sm-10">
      {!! Form::text('customer_lastname',null,['class'=>'form-control', 'placeholder'=>'Introduce tu apellido','size'=>'60', 'id'=>'customer_lastname', 'name'=>'customer_lastname']) !!}
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="customer_phone">Telefono:</label>
    <div class="col-sm-10">
      {!! Form::text('customer_phone',null,['class'=>'form-control', 'placeholder'=>'Introduce tu telefono','size'=>'60', 'id'=>'customer_phone', 'name'=>'customer_phone']) !!}
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="customer_address">Direccion:</label>
    <div class="col-sm-10">
      {!! Form::text('customer_address',null,['class'=>'form-control', 'placeholder'=>'Introduce tu direccion','size'=>'60', 'id'=>'customer_address', 'name'=>'customer_address']) !!}
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="customer_email">Email:</label>
    <div class="col-sm-10">
      {!! Form::text('customer_email',null,['class'=>'form-control', 'placeholder'=>'Introduce tu email','size'=>'60', 'id'=>'customer_email', 'name'=>'customer_email']) !!}
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="curso">Curso:</label>
    <div class="col-sm-10">
      {!!	Form::select('product', $products, null, ['class'=>'form-control','placeholder' => 'Selecciona un curso...', 'id'=>'product', 'name'=>'product']) !!}
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-danger">Guardar</button>
    </div>
  </div>

{!!	csrf_field() !!}
{!! Form::close() !!}
	
	
@endsection


