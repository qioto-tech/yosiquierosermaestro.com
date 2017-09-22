@extends('layouts.template')

@section('title', 'Idonio')

@section('script')
@endsection



@section('sub-title', 'Consulta si eres elegible')

@section('content')

{!! Form::open([null, null, 'class'=>'form-inline', 'role'=>'form','name'=>'frmsearch','id'=>'frmsearch']) !!}
  <div class="form-group ui-widget">
    <label class="sr-only" for="name">Numero de cedula</label>
    {!!	Form::text('ci',null,['class'=>'form-control', 'placeholder'=>'Introduce el numero de cedula','size'=>'60', 'id'=>'ci', 'name'=>'ci']) !!}       
  </div>
  <button type="button" class="btn btn-default" id="btn-search-elegible">Buscar elegible</button>

{!! Form::close() !!}
	
	
@endsection

@section('grid-content')
          <table id="grid-elegible" class="table table-bordered  table-hover">
            <thead>
              <tr>
                <th>CI</th>
                <th>Nombre</th>
                <th>Especialidad</th>
                <th>Criterio</th>
                <th>Por conocimiento</th>
              </tr>
            </thead>
			<tfoot>
			<tr>
				<th colspan="5">
				
				</th>
			</tr>
			</tfoot>            
            <tbody>
            </tbody>
          </table>
@endsection
