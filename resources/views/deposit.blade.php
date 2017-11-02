@extends('layouts.template')
  
@section('title', 'Capacitate Ecuador')

@section('script')
@endsection





@section('info')
 
    <?php
                      
                      
                    $personalidada=utf8_encode("A trav�s del mejoramiento y b�squeda de la calidad y excelencia en el dise�o de programas de capacitaci�n, ponemos a disposici�n de la comunidad docente tem�ticas de capacitaci�n, alternativas alineadas con las necesidades que busca el Ministerio de Educaci�n.");
                    $personalidad=utf8_encode("En esta ocasi�n se han realizado la investigaci�n de las diferentes pruebas psicom�tricas certificadas a nivel internacional que miden el nivel de personalidad que busca el Ministerio de Educaci�n y se han compilado en un sistema de capacitaci�n que simula un ambiente real de las pruebas que se tomar�an por el Ineval y el MinEduc");
                    $personalidad2=utf8_encode("Para poder acceder a esta plataforma se debe comprar el acceso al sistema que permitir� realizar un intento a la prueba psicom�trica por cada pago");
                    
                    $personalidad4=utf8_encode("Mientras m�s te capacites m�s preparado estar�s para las pruebas de personalidad y razonamiento y as� obtener tu elegibilidad.");
                    $personalidadfin=utf8_encode("Empieza a capacitarte ahora, ingresa tus datos para ingresar al simulador. Aceptamos tarjetas Visa y Mastercard de cr�dito y d�bito, recuerda que para poder realizar la transacci�n tu tarjeta deber� estar habilitada para realizar compras electr�nicas.");
                     
                    $personalidadven=utf8_encode("Nuestros cursos y pruebas de capacitaci�n se adaptan a tu tiempo y espacio, puedes acceder en el horario que se ajuste mejor a ti y desde el lugar que te encuentres. ");
                    $personalidadBAN=utf8_encode("Simulador de ex�men: Contamos con bancos de preguntas para repasar antes de presentar el examen. Se provee feedback sobre las preguntas, ayud�ndote a mejorar y reforzar tus conocimientos. ");
                    $personalidadesp=utf8_encode("Sigue los tips y recomendaciones para facilitarte el entrenamiento");
                    ?>


<div class="single_stuff wow fadeInDown">
    <div class="single_stuff_img"> <a href="#"><br><br></a> </div>
             
              <div class="single_stuff_article">
                <div class="single_sarticle_inner"> 
                  <div class="stuff_article_inner">
                      products
                         <div><img style="visibility: visible; width: 70%;" src="images/deposito.png" alt=""></div>
                         <p>{!!$personalidada!!} <a target="_blank" href="https://educacion.gob.ec/quiero-ser-maestro-6/"></a></p>
                         <br>
                         
                    <p>{!!$personalidadfin!!} <a target="_blank" href="https://educacion.gob.ec/quiero-ser-maestro-6/"></a></p>
                         <div id="promocion"><a onclick="RenderPartialGenericFotografia('uploadImagePopUp', 1, 2, 3)" ><img src="{{ asset('public/img/fotograf.png')}}" style="width:111px"></a> </div>
           
                         <div id='basic-modal-content'></div>
                     <h2>Generar orden de pedido</h2>
						
						<p>

@include('order.partials.errors')


{!! Form::open(['route' => 'order.store', 'method' => 'POST','id' => 'DataG', 'class'=>'form-horizontal']) !!}

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
      {!!	Form::select('product', ['1'], null, ['class'=>'form-control','placeholder' => 'Selecciona un curso...', 'id'=>'product', 'name'=>'product']) !!}
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="curso">Forma de pago:</label>
    <div class="col-sm-10">
      {!!	Form::select('pay_type', ['1' => 'Tarjeta de credito', '2' => 'Trasferencia o Deposito Bancario'], null, ['class'=>'form-control','placeholder' => 'Selecciona la forma de pago...', 'id'=>'pay_type', 'name'=>'pay_type']) !!}
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      
       <input id="submit" name="submit" value="Pagar" onclick="validate();" class="btn btn-danger"  type="submit"  />

    </div>
  </div>


{!!	csrf_field() !!}
{!! Form::close() !!}

</p>
							<div class="col-md-10" id="result-elegible">
							</div>
			               
                    
                                 
                    
                  </div>
                </div>
              </div>
            </div>

              <div class="single_stuff wow fadeInDown">
              <div class="single_stuff_img"> <a href="#"><img src="images/capacitate.jpg" alt=""></a> </div>
              <div class="single_stuff_article">
                <div class="single_sarticle_inner"> <a class="stuff_category" href="#">Ingreso al simulador</a>
                  <div class="stuff_article_inner"> <span class="stuff_date">Sep <strong>1</strong></span>
                    <h2><a href="#">Capacitate para aprobar las pruebas de personalidad</a></h2>
                  
                    
                    <p>{!!$personalidada!!}</p>
                    <p>{!!$personalidad!!}</p>
                    <div><img style="visibility: visible; width: 90%;" src="images/plataforma.png" alt=""></div>
                    <p>{!!$personalidad2!!}</p>
                    <div><img style="visibility: visible; width: 200px;" src="images/5usd.png" alt=""></div>
                    <p>{!!$personalidadesp!!}</p>
                    <div><img style="visibility: visible; width: 10%;" src="images/247.png" alt=""></div>
                    <p>{!!$personalidadven!!}</p>
                    <div><img style="visibility: visible; width: 10%;" src="images/computadora.png" alt=""></div>
                    <p>{!!$personalidadBAN!!}</p>
                    
                    
                    
                    <p>{!!$personalidad4!!} <a target="_blank" href="https://educacion.gob.ec/quiero-ser-maestro-6/"></a></p>
                        
                  </div>
                </div>
              </div>
            </div>
<br><br>
@endsection

@section('content')

           
   
	
	<script>
            
         
            function validate() {
                
                

$('#submit').attr('disabled', 'disabled');
                var has_empty = false;

   $(".form-horizontal").find( 'input[type!="hidden"]' ).each(function () {

      if ( ! $(this).val() ) { has_empty = true; return false; }
   });

   if ( has_empty ) { 
       alert("Debe llenar todos los campos");
       //$("#submit").removeAttr("disabled");
        return false; }
    else
    {
        $( "#DataG" ).submit();
         //$("#submit").removeAttr("disabled");
        return true;

}
}

function RenderPartialGenericFotografia($idPartial, $id_catalogo_fotografia,$id_usuario_servicio,$id_auxiliar) {

   alert("here");
callModal('cls');
    var url = "/yosiquierosermaestro.com/public/render/" + $idPartial;
    $.ajax({
        type: "GET",
        url: url,
        data: {
        }}).done(function (newHtml) {

        /* output the javascript object to HTML */
        $('#basic-modal-content').html(newHtml.newHtml);
        $('#basic-modal-content').find('#id_catalogo_fotografia').val($id_catalogo_fotografia);
        $('#basic-modal-content').find('#id_usuario_servicio').val($id_usuario_servicio);
        $('#basic-modal-content').find('#id_auxiliar').val($id_auxiliar);
    });
}



    
 
</script>
@endsection


