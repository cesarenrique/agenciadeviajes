@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$hotel->nombre}}</div>

                <div class="card-body">


                    <div>
                      <h3>Alojamiento</h3>
                      <ul>
                        <li><label>precio día: &nbsp; </label>{{$alojamiento->precio}}</li>
                        <li><label>pension: &nbsp; </label>{{$alojamiento->pension}}</li>
                        <li><label>Tipo Habitacion: &nbsp;</label>{{$alojamiento->tipoHabitacion}}</li>
                        <li><label>Temporada: &nbsp; </label>{{$alojamiento->temporada}}</li>
                        <li><label>fecha desde: &nbsp; </label>{{$alojamiento->fecha_desde}}</li>
                        <li><label>fecha hasta: &nbsp; </label>{{$alojamiento->fecha_hasta}}</li>

                      </ul>
                    </div>

                    <div>

                      <h3>Habitacion &nbsp;{{$habitacion->numero}}</h3>
                    </div>



                    <div>
                      <h3>Cliente</h3>
                      <ul>
                        <li><label>NIF: &nbsp; </label>{{$cliente->nif}}</li>
                        <li><label>Nombre: &nbsp; </label>{{$cliente->nombre}}</li>
                        <li><label>Correo: &nbsp;</label>{{$cliente->correo}}</li>
                        <li><label>Telefono: &nbsp; </label>{{$cliente->telefono}}</li>
                        <li><label>Tarjeta: &nbsp; </label>{{$tarjeta->numero}}</li>

                      </ul>
                    </div>

                    <div>
                      <h3>Datos</h3>
                      <ul>
                        <li><label>Fecha desde: &nbsp; </label>{{$fecha_desde}}</li>
                        <li><label>Fecha hasta: &nbsp; </label>{{$fecha_hasta}}</li>
                        <li><label>Total a pagar: &nbsp; </label>{{$totalPagar}} euros</li>

                      </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
