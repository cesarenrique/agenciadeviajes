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

                    <h3>Habitacion &nbsp;{{$habitacion->numero}}</h3>
                  </div>
                  <?php if($cantidadOcupado==0){?>
                  <div>
                    <h3>Habitacion libre</h3>
                    <form method="POST" action="{{route('alojamientos.habitacions.reservas.tarjeta',[$alojamiento->identificador,$habitacion->identificador])}}">
                      @csrf
                      <input id="Cliente_id" type="number"  value="{{$cliente->identificador}}" class="form-control" name="Cliente_id" hidden readonly required>
                      <div class="form-group row">
                          <label for="fecha_desde" class="col-md-4 col-form-label text-md-right">Fecha desde</label>

                          <div class="col-md-6">
                              <input id="fecha_desde" type="date" min="{{$alojamiento->fecha_desde}}" max="{{$alojamiento->fecha_hasta}}" value="{{$fecha_desde}}" class="form-control" name="fecha_desde" readonly required>
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="fecha_hasta" class="col-md-4 col-form-label text-md-right">Fecha hasta</label>

                          <div class="col-md-6">
                              <input id="fecha_hasta" type="date" min="{{$alojamiento->fecha_desde}}" max="{{$alojamiento->fecha_hasta}}" value="{{$fecha_hasta}}" class="form-control" name="fecha_hasta" readonly required>


                          </div>
                      </div>

                      <h3>Vincular Tarjeta</h3>
                      <div class="form-group row">
                          <label for="NIF" class="col-md-4 col-form-label text-md-right">NIF</label>

                          <div class="col-md-6">
                              <input id="NIF" type="text"  class="form-control" name="NIF" value="{{$cliente->nif}}" readonly required>
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
                          <div class="col-md-6">
                              <input id="nombre" type="text"  class="form-control" name="nombre" value="{{$cliente->nombre}}"readonly required/>
                          </div>
                      </div>


                      <div class="form-group row">
                          <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                          <div class="col-md-6">
                              <input id="email" type="text"  class="form-control" name="email" value="{{$cliente->correo}}" readonly required/>


                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="telefono" class="col-md-4 col-form-label text-md-right">Telefono</label>

                          <div class="col-md-6">
                              <input id="telefono" type="text"  class="form-control" name="telefono" value="{{$cliente->telefono}}" readonly required/>


                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="tarjeta" class="col-md-4 col-form-label text-md-right">Tarjeta</label>

                          <div class="col-md-6">
                              <input id="tarjeta" type="text"  class="form-control" name="tarjeta"  required/>


                          </div>
                      </div>
                      <div class="form-group row mb-0">
                          <div class="col-md-8 offset-md-4">
                              <button type="submit" id="buscar" class="btn btn-primary">
                                  Reservar
                              </button>
                          </div>
                      </div>
                    </form>
                  </div>

                <?php }else{ ?>
                  <ul>
                  <?php
                    foreach ($ocupadas as $fecha) {
                      ?>
                      <li>{{$fecha->abierto}}</li>
                      <?php
                    }
                    ?>
                  </ul>

                <?php }?>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
