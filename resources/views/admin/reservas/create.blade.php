@extends('admin.template.main')

@section('title', 'Nueva Reserva')

@section('content')

	@if(count($errors)>0)

		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)

					<li>
						{{ $error}}
					</li>

				@endforeach
			</ul>
			

		</div>
		
	@endif

	<div class="container">

		<div>
			<h3>Nueva Reserva</h3>
		</div>

		{!! Form::open(['route'=>'reservas.store', 'method'=>'POST','files'=>'true']) !!}

		<div class="row">
  			<div class="col-md-8">
				<div class="form-group">
				{!! Form::label('fecha','Fecha*') !!}
				{!! Form::date('fecha',null,['class'=>'form-control','placeholder'=>'Titulo','required']) !!}
				</div>
			</div>

			<div class="col-md-8">
				<div class="form-group">
				{!! Form::label('hora_desde','Hora de Inicio*') !!}
				{!! Form::text('hora_desde',null,['class'=>'form-control','placeholder'=>'Hora de Inicio','required']) !!}
				</div>

				<div class="form-group">
				{!! Form::label('hora_hasta','Hora de Fin*') !!}
				{!! Form::text('hora_hasta',null,['class'=>'form-control','placeholder'=>'Hora de Fin','required']) !!}
				</div>
			</div>
  			<div class="col-md-4">
  				<div class="form-group">
				{!! Form::label('avion_id','Avion*') !!}
				{!! Form::select('avion_id',$aviones,null,['class'=>'form-control select-tag','required']) !!}
				</div>


				<div class="form-group">
				{!! Form::label('user_id','Usuario*') !!}
				{!! Form::select('user_id',$usuarios,null,['class'=>'form-control select-category','required']) !!}
				</div>

  			</div>
		</div>		

		<div class="form-group">
			{!! Form::submit('Crear',['class'=>'btn btn-primary']) !!}
		</div>

		{!! Form::close() !!}


	</div>
	
	

@endsection

@section('js')
	<script>

		$('.select-tag').chosen({
			placeholder_text_multiple:'Seleccione al menos 3 tags',
			no_results_text: "Oops, no hay tags parecido a ",
			search_contains:true,

		});

		$('.select-category').chosen({
			placeholder_text_multiple:'Seleccione al menos 3 tags',
			no_results_text: "Oops, no hay categoria parecida a ",
			search_contains:true,

		});

		$('#trumbowyg-demo').trumbowyg();

		document.getElementById("upload").onchange = function() {
			var reader = new FileReader(); //instanciamos el objeto de la api FileReader

  			reader.onload = function(e) {
    		document.getElementById("image").src = e.target.result;
  			};

  		// read the image file as a data URL.
  		reader.readAsDataURL(this.files[0]);
		};

		function limite_textarea(valor) {   
    		total = valor.length;
        	document.getElementById('cont').innerHTML = total;
		}

		

		
	</script>

@endsection