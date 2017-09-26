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
                      
                      
                    $personalidada=utf8_encode("A trav�s del mejoramiento y b�squeda de la calidad y excelencia en el dise�o de programas de capacitaci�n, ponemos a disposici�n de la comunidad docente tem�ticas de capacitaci�n, alternativas alineadas con las necesidades que busca el Ministerio de Educaci�n.");
                    $personalidad=utf8_encode("En esta ocasi�n se han realizado la investigaci�n de las diferentes pruebas psicom�tricas certificadas a nivel internacional que miden el nivel de personalidad que busca el Ministerio de Educaci�n y se han compilado en un sistema de capacitaci�n que simula un ambiente real de las pruebas que se tomar�an por el Ineval y el MinEduc");
                    $personalidad2=utf8_encode("Para poder acceder a esta plataforma se debe comprar el acceso al sistema que permitir� realizar un intento a la prueba psicom�trica por cada pago");
                    $personalidad3=utf8_encode("Con el fin de promover el desarrollo profesional de docentes, IDEA pone a su disposici�n certificaciones con un mayor n�mero de horas de capacitaci�n que permitir�n a los participantes especializarse en alg�n tema espec�fico y recibir un t�tulo de certificaci�n en distintos temas relacionados con la pedagog�a... ");
                    
                    $personalidad4=utf8_encode("Para verificar los archivos en los archivos oficiales del Ministerio de Educaci�n has click  ");
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


