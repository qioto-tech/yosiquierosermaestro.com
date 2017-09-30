@extends('layouts.template')

@section('title', 'Idoneo')

@section('script')
@endsection



@section('sub-title', 'Consulta si eres idoneo')

@section('info')
              <div class="single_stuff wow fadeInDown">
              <div class="single_stuff_img"> <a href="#"><img src="{{ URL::asset('images/capacitate.jpg') }}" alt=""></a> </div>
              <div class="single_stuff_article">
                <div class="single_sarticle_inner"> <a class="stuff_category" href="#">Buscar idoneo</a>
                  <div class="stuff_article_inner"> <span class="stuff_date">Sep <strong>1</strong></span>
                    <h2><a href="#">Verifica si eres idoneo</a></h2>	<br><br>
                  </div>
                  <div>
                  	<p>
						{!! Form::open([null, null, 'class'=>'form-inline', 'role'=>'form','name'=>'frmsearch','id'=>'frmsearch']) !!}
						  <div class="form-group ui-widget">
						    <label class="sr-only" for="name">Numero de cedula</label>
						    {!!	Form::text('ci',null,['class'=>'form-control', 'placeholder'=>'Introduce el numero de cedula','size'=>'60', 'id'=>'ci', 'name'=>'ci']) !!}       
						  </div>
						  <button type="button" class="btn btn-default" id="btn-search-suitable">Buscar elegible</button>
						
						{!! Form::close() !!}
                  	</p>
                  	<p>
          <table id="grid-elegible" class="table table-bordered  table-hover">
            <thead>
              <tr>
                <th></th>
                <th>Detalle</th>
              </tr>
            </thead>
			<tfoot>
			<tr>
				<th colspan="2">
				
				</th>
			</tr>
			</tfoot>            
            <tbody>
            </tbody>
          </table>
                  	
                  	</p>
                  </div>
                </div>
              </div>
            </div>
<br><br>	
@endsection


