@extends('admin.template.main')

@section('title','Reservas')

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-md-2">
    		<a href=" {{route('reservas.create')}} " class="btn btn-info">Nuevo</a>    		
    	</div>

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Calendario de Reservas</div>

<div class="panel-body">
                    {!! $calendar->calendar() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
{!! $calendar->script() !!}
@endsection