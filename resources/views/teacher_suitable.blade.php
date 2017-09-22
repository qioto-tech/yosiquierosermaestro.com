@extends('layouts.template')

@section('title', 'Idonio')

@section('script')
@endsection



@section('sub-title', 'Consulta si eres idoneo')

@section('content')

{!! Form::open([null, null, 'class'=>'form-inline', 'role'=>'form','name'=>'frmsearch','id'=>'frmsearch']) !!}
  <div class="form-group ui-widget">
    <label class="sr-only" for="name">Numero de cedula</label>
    {!!	Form::text('ci',null,['class'=>'form-control', 'placeholder'=>'Introduce el numero de cedula','size'=>'60', 'id'=>'ci', 'name'=>'ci']) !!}       
  </div>
  <button type="button" class="btn btn-default" id="btn-search-suitable">Buscar elegible</button>

{!! Form::close() !!}
	
	
@endsection

@section('grid-content')
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
@endsection
