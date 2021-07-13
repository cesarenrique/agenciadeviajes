@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$hotel->nombre}}</div>

                <div class="card-body">
                  <div>
                    <h3>Alojamiento escogido</h3>
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
                    <h3>Habitacion libre</h3>
                    <form method="POST" action="{{route('alojamientos.fechas.store',$alojamiento->identificador)}}">
                      @csrf
                      <div class="form-group row">
                          <label for="fecha_desde" class="col-md-4 col-form-label text-md-right">Fecha desde</label>

                          <div class="col-md-6">
                              <input id="fecha_desde" type="date" min="{{$temporada->fechaInicio}}" max="{{$temporada->fechaFin}}" value="{{$temporada->fechaInicio}}" class="form-control" name="fecha_desde" readonly required>
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="fecha_hasta" class="col-md-4 col-form-label text-md-right">Fecha hasta</label>

                          <div class="col-md-6">
                              <input id="fecha_hasta" type="date" min="{{$temporada->fechaInicio}}" max="{{$temporada->fechaFin}}" value="{{$temporada->fechaInicio}}" class="form-control" name="fecha_hasta" readonly required>


                          </div>
                      </div>

                      <div class="form-group row mb-0">
                          <div class="col-md-8 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Reservar
                              </button>
                          </div>
                      </div>
                    </form>

                  </div>
                  <div style="padding-bottom: 20px">
                  </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
