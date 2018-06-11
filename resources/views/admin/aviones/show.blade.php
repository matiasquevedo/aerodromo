@extends('admin.template.main')

@section('title','Reservas')

@section('content')
<div class="container">
	<h2>Avión: {{$avion->modelo}} </h2>
	<div class="row">
		<div class="col-md-6">
			<h3>Descripción Ténica</h3>
			<div class="motor">
				<h4>Motor</h4>
				<p>Modelo: {{$avion->motor->modelo}}</p> 
				<p>Numeración: {{$avion->motor->numeracion}}</p>
				<p>Descripción: {{$avion->motor->descripcion}}</p>				
			</div>
			<div class="helice">
				<h4>Helice</h4>
				<p>Modelo: {{$avion->helice->modelo}}</p>				
				<p>Numeración: {{$avion->helice->numeracion}}</p>
				<p>Descripción: {{$avion->helice->descripcion}}</p>
			</div>

			
		</div>
		<div class="col-md-6">
			<h3>Reservas</h3>
			 <table class="table table-striped">
			  <thead>
			    <tr>			    	
			      <th>Usuario</th>
			      <th>Fecha</th>
			      <th>Horas</th>
			      <th>Estado</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@foreach($reservas as $reserva)
					<div class="text-center">
						<tr>						
							<td>{{$reserva->user->name}}</td>
							<td>{{$reserva->fecha}}</td>
							<td>{{$reserva->horas}} hs</td>
							<td>
								@if($reserva->state == "0")
							        <span class="label label-warning">Reservado</span>
							    @endif
						    	@if($reserva->state == "1")
						            <span class="label label-success">Realizado</span>
						        @endif
					        	@if($reserva->state == "2")
					                <span class="label label-danger">Cancelado</span>
					            @endif
							</td>
						</tr>						
					</div>
			  	@endforeach			  
			  </tbody>
			</table>
		</div>
	</div>
</div>

@endsection