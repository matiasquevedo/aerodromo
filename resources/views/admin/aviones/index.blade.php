@extends('admin.template.main')

@section('title', 'Aviones')

@section('content')
<div class="row">
  <div class="col-md-1">
  	
  	<a href=" {{route('aviones.create')}} " class="btn btn-info">Nuevo</a>

  </div>
  <div class="col-md-10">

  		<table class="table table-striped">
  <thead>
    <tr>
      <th>Modelo</th>
      <th>Motor</th>
      <th>Helice</th>
      <th>Acción</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($aviones as $avion)
		<tr>
			<td><a href="{{ route('aviones.show', $avion->id) }}">{{$avion->modelo}}</a></td>
      <td>{{$avion->motor->modelo}}</td>
      <td>{{$avion->helice->modelo}}</td>
			<td><a href="{{ route('aviones.edit', $avion->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench"></span></a><a href="{{ route('aviones.destroy', $avion->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a></td>
		</tr>


  	@endforeach
  
  </tbody>
</table>
{!! $aviones->render() !!}  	

  </div>
  <div class="col-md-1">
  	
  	

  </div>
</div>

@endsection


