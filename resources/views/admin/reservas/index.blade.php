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
                    <div id='calendar'></div>
                    <div id="eventContent" title="Event Details" style="display:none;">
                        Start: <span id="startTime"></span><br>
                        End: <span id="endTime"></span><br><br>
                        <p id="eventInfo"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="calendarModal" class="modal fade">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
            <h4 id="modalTitle" class="modal-title"></h4>
        </div>
        <div id="modalBody" class="modal-body">
            Reservado por: <p id="userReserva"></p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
</div>
</div>

<div id="reservaModal" class="modal fade">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
            <h4 id="fechaTitle" class="modal-title"></h4>
        </div>
        <div id="modalBody" class="modal-body">
                    {!! Form::open(['route'=>'reservas.store', 'method'=>'POST','files'=>'true']) !!}

                            <div class="form-group">
                            {!! Form::text('fecha',null,['class'=>'form-control selectFecha','placeholder'=>'Titulo']) !!}
                            </div>

                            <div class="form-group">
                            {!! Form::label('hora_desde','Hora de Inicio*') !!}
                            {!! Form::text('hora_desde',null,['class'=>'form-control','placeholder'=>'Hora de Inicio','required']) !!}
                            </div>

                            <div class="form-group">
                            {!! Form::label('hora_hasta','Hora de Fin*') !!}
                            {!! Form::text('hora_hasta',null,['class'=>'form-control','placeholder'=>'Hora de Fin','required']) !!}
                            </div>

                            <div class="form-group">
                            {!! Form::label('avion_id','Avion*') !!}
                            {!! Form::select('avion_id',$aviones,null,['class'=>'form-control select-tag','required']) !!}
                            </div>


                            <div class="form-group">
                            {!! Form::label('user_id','Usuario*') !!}
                            {!! Form::select('user_id',$usuarios,null,['class'=>'form-control select-category','required']) !!}
                            </div>
                    </div>      

                    <div class="form-group">
                        {!! Form::submit('Crear',['class'=>'btn btn-primary']) !!}

                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    </div>

                    {!! Form::close() !!} 

        </div>
    </div>
</div>
</div>

@endsection



@section('js')
<script>
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            // put your options and callbacks here
            editable: true,
            height: 600,
            eventClick:  function(event, jsEvent, view) {
                $('#modalTitle').html(event.title);
                $('#userReserva').html(event.user);
                console.log(event.title);
                $('#calendarModal').modal();
            },
            dayClick: function(date, jsEvent, view) { 
                $('.selectFecha').hide();
                $('#fechaTitle').html(date.format());
                $('.selectFecha').val(date.format());
                $('#reservaModal').modal(); 

            },
            eventResizeStart: function() { tooltip.hide() },
            eventDragStart: function() { tooltip.hide() },
            viewDisplay: function() { tooltip.hide() },            
            events : [
                @foreach($reservas as $reserva)
                {
                    title : '{{ $reserva->avion->modelo }}',
                    start : '{{ $reserva->fecha }}',
                    user : ' {{$reserva->user->name}} ',
                },
                @endforeach
            ],


            })
    });
</script>
@endsection