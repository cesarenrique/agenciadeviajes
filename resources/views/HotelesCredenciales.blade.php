@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">Crear Access Token</div>

            <div class="card-body">
              <div>
                <table>
                  <tr>
                    <th>URL</th>
                    <td>{{$credenciales->url}}</td>
                  </tr>
                  <tr>
                    <th>Cliente</th>
                    <td>{{$credenciales->cliente}}</td>
                  </tr>
                  <tr>
                    <th>Secret</th>
                    <td>{{$credenciales->token}}</td>
                  </tr>
                  <tr>
                    <th>Access Token</th>
                    <td><textarea rows='10' cols='50' >{{$credenciales->accessToken}}</textarea></td>
                  </tr>

                </table>
              </div>
              <div>
                <a class="nav-link" href="{{ route('HotelesCredenciales.create')}}">Crear Credenciales</a>
               </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
