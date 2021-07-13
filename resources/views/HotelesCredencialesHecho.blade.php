@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">Crear Access Token</div>

            <div class="card-body">
            <div>
              <button  id="token" class="btn btn-primary ">Obtener token</button>
            </div>
            <div>
            <form method='POST' action="{{ route('HotelesCredenciales.store') }}">
              @csrf


              <div class="form-group row">
                  <label for="url" class="col-md-4 col-form-label text-md-right">Token Access</label>

                  <div class="col-md-6">
                      <textarea id="accessToken" type="text" class="form-control" name="accessToken" required> </textarea>


                  </div>
              </div>

              <input hidden id="url" type="text" class="form-control" name="url" value='{{$url}}' >
              <input hidden id="cliente" type="number" class="form-control" name="cliente" value={{$cliente}} >
              <input hidden id="token" type="text" class="form-control" name="token" value='{{$token}}'>

              <div class="form-group row mb-0">
                  <div class="col-md-8 offset-md-4">
                      <button type="submit" class="btn btn-primary">
                          Usar
                      </button>
                  </div>
              </div>
            </form>
          </div>
        </div>
    </div>

            <script type="application/javascript">
                $( document ).ready(function() {
                  var url = '{{$url}}'+'oauth/token';
                  var clientID = {{$cliente}};
                  var clientSecret = '{{$token}}';
                  var grantType = 'client_credentials';

                  let token= document.getElementById('token')
                  token.addEventListener('click', e =>{
                    fetch(url,{
                      method: 'POST',
                      body: JSON.stringify({
                        client_id: clientID,
                        client_secret: clientSecret,
                        grant_type: grantType
                      }),
                      headers: { 'Content-Type':'application/json'},
                    }).then(response =>{
                      return response.json();
                    }).then(data=>{
                      $('#accessToken').val(data.access_token);
                    })
                  });

                });

            </script>
        </div>
    </div>
</div>
@endsection
