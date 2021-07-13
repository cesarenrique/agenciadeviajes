@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$hotel->nombre}}</div>

                <div class="card-body">
                  <div>
                    <?php
                      $i=1;
                      foreach ($alojamientos as $alojamiento) {
                    ?>
                    <div>
                      <h3>Alojamiento {{$i}}</h3>
                      <ul>
                        <li><label>precio día: &nbsp; </label>{{$alojamiento->precio}}</li>
                        <li><label>pension: &nbsp; </label>{{$alojamiento->pension}}</li>
                        <li><label>Tipo Habitacion: &nbsp;</label>{{$alojamiento->tipoHabitacion}}</li>
                        <li><label>Temporada: &nbsp; </label>{{$alojamiento->temporada}}</li>
                        <li><label>fecha desde: &nbsp; </label>{{$alojamiento->fecha_desde}}</li>
                        <li><label>fecha hasta: &nbsp; </label>{{$alojamiento->fecha_hasta}}</li>
                        <a href="{{route('alojamientos.habitacions.index',$alojamiento->identificador)}}">Comprobar Disponibilida</a>
                      </ul>
                    </div>
                    <?php
                        $i++;
                    }
                    ?>
                  <div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
