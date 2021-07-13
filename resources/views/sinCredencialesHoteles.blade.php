@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>No tiene credenciales</h1>
            <div>
              <a class="nav-link" href="{{ route('HotelesCredenciales.create')}}">Crear Credenciales</a>
             </div>
        </div>
    </div>
</div>
@endsection
