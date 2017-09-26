@extends('layouts.template')

@section('title', 'Pagos')

@section('script')
@endsection



@section('sub-title', 'Generar orden de pedido')

@section('info')
 
              <div class="single_stuff wow fadeInDown">
              <div class="single_stuff_img"> <a href="#"><img src="images/capacitate.jpg" alt=""></a> </div>
              <div class="single_stuff_article">
                <div class="single_sarticle_inner"> <a class="stuff_category" href="#">Ingreso al simulador</a>
                  <div class="stuff_article_inner"> <span class="stuff_date">Sep <strong>1</strong></span>
                    <h2><a href="#">Capacitate para aprobar las pruebas de personalidad</a></h2>
                      <?php
                      
                      
                    $personalidada=utf8_encode("A través del mejoramiento y búsqueda de la calidad y excelencia en el diseño de programas de capacitación, ponemos a disposición de la comunidad docente temáticas de capacitación, alternativas alineadas con las necesidades que busca el Ministerio de Educación.");
                    $personalidad=utf8_encode("En esta ocasión se han realizado la investigación de las diferentes pruebas psicométricas certificadas a nivel internacional que miden el nivel de personalidad que busca el Ministerio de Educación y se han compilado en un sistema de capacitación que simula un ambiente real de las pruebas que se tomarían por el Ineval y el MinEduc");
                    $personalidad2=utf8_encode("Para poder acceder a esta plataforma se debe comprar el acceso al sistema que permitirá realizar un intento a la prueba psicométrica por cada pago");
                    $personalidad3=utf8_encode("Con el fin de promover el desarrollo profesional de docentes, IDEA pone a su disposición certificaciones con un mayor número de horas de capacitación que permitirán a los participantes especializarse en algún tema específico y recibir un título de certificación en distintos temas relacionados con la pedagogía... ");
                    
                    $personalidad4=utf8_encode("Para verificar los archivos en los archivos oficiales del Ministerio de Educación has click  ");
                    ?>
                    
                    <p>{!!$personalidada!!}</p>
                    <p>{!!$personalidad!!}</p>
                    <div><img style="visibility: visible; width: 90%;" src="images/plataforma.png" alt=""></div>
                    <p>{!!$personalidad2!!}</p>
                    <div><img style="visibility: visible; width: 200px;" src="images/5usd.png" alt=""></div>
                    <p>{!!$personalidad2!!} <a target="_blank" href="http://www.yosiquierosermaestro.com/teacher">aqui...</a></p>
                    <p>{!!$personalidad3!!} <a  target="_blank" href="http://www.yosiquierosermaestro.com/teacher">aqui...</a> </p>
                    <p>{!!$personalidad4!!} <a target="_blank" href="https://educacion.gob.ec/quiero-ser-maestro-6/">aqui...</a></p>
                  </div>
                </div>
              </div>
            </div>
<br><br>
@endsection

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
	
	<script>



    $(".imagens").attr("src","images/capacitate.jpg");

</script>
@endsection


