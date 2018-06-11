@extends('admin.template.main')

@section('title', 'Nuevo Avion')

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
			<h3>Nuevo Avion</h3>
		</div>

		{!! Form::open(['route'=>'aviones.store', 'method'=>'POST','files'=>'true']) !!}

		<div class="row">
  			<div class="col-md-8">
				<div class="form-group">
				{!! Form::label('modelo','Modelo*') !!}<p><i>Minimo 8 Caracteres</i></p>
				{!! Form::text('modelo',null,['class'=>'form-control','placeholder'=>'Modelo','required']) !!}
				</div>
			</div>

  			<div class="col-md-8">
  				<h3>Motor</h3>
				<div class="form-group">
				{!! Form::label('modeloMotor','Modelo Motor*') !!}<p><i>Minimo 8 Caracteres</i></p>
				{!! Form::text('modeloMotor',null,['class'=>'form-control','placeholder'=>'Modelo Motor','required']) !!}
				</div>
			</div>

  			<div class="col-md-8">
				<div class="form-group">
				{!! Form::label('numeracion','Numeración*') !!}<p><i>Minimo 8 Caracteres</i></p>
				{!! Form::text('numeracion',null,['class'=>'form-control','placeholder'=>'Numeración','required']) !!}
				</div>
			</div>

  			<div class="col-md-8">
				<div class="form-group">
				{!! Form::label('descripcionMotor','Descripción Motor*') !!}<p><i>Minimo 8 Caracteres</i></p>
				{!! Form::text('descripcionMotor',null,['class'=>'form-control','placeholder'=>'Descripción Motor','required']) !!}
				</div>
			</div>

  			<div class="col-md-8">
				<h3>Helice</h3>
				<div class="form-group">
				{!! Form::label('modeloHelice','Modelo Helice*') !!}<p><i>Minimo 8 Caracteres</i></p>
				{!! Form::text('modeloHelice',null,['class'=>'form-control','placeholder'=>'Modelo Helice','required']) !!}
				</div>
			</div>

  			<div class="col-md-8">
				<div class="form-group">
				{!! Form::label('numeracionH','Numeración Helice*') !!}<p><i>Minimo 8 Caracteres</i></p>
				{!! Form::text('numeracionH',null,['class'=>'form-control','placeholder'=>'Numeración Helice','required']) !!}
				</div>
			</div>

  			<div class="col-md-8">
				<div class="form-group">
				{!! Form::label('descripcionH','Descripción Helice*') !!}<p><i>Minimo 8 Caracteres</i></p>
				{!! Form::text('descripcionH',null,['class'=>'form-control','placeholder'=>'Descripción Helice','required']) !!}
				</div>
			</div>






  			<div class="col-md-4">
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