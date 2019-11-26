@extends('layouts.master')

@section('titulo','Calendario de Pedidos')

@section('cabecera')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-8">
          <img src="{{ asset('/img/logo1.png') }}" alt="logo la comita" class="img-fluid float-right w-50 h-75">
        </div><!-- /.col -->
        <div class="col-sm-4">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ route('pedidos.index') }}">Lista de Pedidos</a></li>
            <li class="breadcrumb-item active">Calendario de Pedidos</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="card card-info">
          <div class="card-header">
             <h5 class="card-title">CALENDARIO DE PEDIDOS</h5>
          </div>
            <div class="card-body">
            	<div id="calendar"></div>
            </div>
      </div>
    </div>
</section>
@endsection

@push('styles')
<link href="{{ asset('calendario/fullcalendar.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('calendario/moment.min.js') }}" ></script>
<script src="{{ asset('calendario/fullcalendar.js') }}" ></script>
<script src="{{ asset('calendario/es.js') }}" ></script>
<script src="{{ asset('calendario/locale-all.js') }}" ></script>

<script>
$(function () {

    $('#calendar').fullCalendar({
      lang: 'es',
      eventClick: function(calEvent, jsEvent, view) {
          //alert('ENTIDAD: ' + calEvent.datos);
          // change the border color just for fun
          $(this).css('border-color', 'red');
      },
      //Cambia los colores del evento
      eventAfterRender: function (event, element, view) {
          var fechaHoy = new Date();
          //var estado = event.estado;
          //var cancelado =  "calcelado";
         //alert(cancelado);
         //console.log(event.start);
          if ( event.end == fechaHoy) {
              //event.color = "#FFB347"; //En funcion
              /*if (event.estado == 'cancelado') {
                  //event.color = "#AEC6CF"; //Cancelado
                  element.css('background-color', '#FA5858');
              }else{
                  element.css('background-color', '#FFB347');
              }*/
              element.css('background-color', '#FFB347');
          } else if (event.start < fechaHoy ) {
              //event.color = "#77DD77"; //Concluído OK
              element.css('background-color', '#17a2b8');
          } else if (event.start > fechaHoy ) {
              //event.color = "#AEC6CF"; //No iniciado
              element.css('background-color', '#bf47ff');
          }
      },
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'HOY',
        month: 'MES',
        week : 'SEMANA',
        day  : 'DÍA'
      },
      //Random default events
      events    :[
        //url:'events'
          @foreach($pedidos as $pedido)
          {
              title : '{{ ($pedido->carrito_id == 0) ? $pedido->cotizacion->user->fullname : $pedido->carrito->user->fullname }} -  {{ $pedido->anticipo }}Bs.',
              start : '{{ $pedido->fecha_entrega }}',
              end   : '{{ $pedido->fecha_entrega}}',
              estado: '{{ ($pedido->carrito_id == 0) ? $pedido->cotizacion->estado : $pedido->carrito->estado }}',
              datos : '{{ ($pedido->carrito_id == 0) ? $pedido->cotizacion->codigo : $pedido->carrito->codigo }}',
              url   : '{{ ($pedido->carrito_id == 0) ? route('cotizaciones.show', $pedido->cotizacion->id) : route('carrito.show', $pedido->carrito->id) }}'
          },
          @endforeach
      ],
      editable  : false,
      droppable : true, // this allows things to be dropped onto the calendar !!!

    })
  })
</script>
@endpush

