<?php

namespace App\Http\Traits;

use GuzzleHttp\Client;
use App\Credenciales;

trait Hoteles{

    public function consumeAPI($method,$url){
        $credenciales=Credenciales::where('tipo','hoteles')->firstOrFail();

        try{
            $client = new Client([
                    // Base URI is used with relative requests
                'base_uri' => $credenciales->url,
                  // You can set any number of default request options.
                'timeout'  => 10.0,
            ]);
            $request=$client->request($method, $url, [
                        'headers'=> ['Authorization'=> 'Bearer '.$credenciales->accessToken,
                  ]
            ]);
            $request->getStatusCode();
            $response = $request->getBody();
            return json_decode($response);
        }catch(Exception $e){
            return view('errorConsumeHoteles');
        }

    }

    public function consumeAPIURL($url){
        $credenciales=Credenciales::where('tipo','hoteles')->firstOrFail();

        try{
            $client = new Client();
            $request=$client->get( $url, [
                        'headers'=> ['Authorization'=> 'Bearer '.$credenciales->accessToken,
                  ]
            ]);
            $request->getStatusCode();
            $response = $request->getBody();
            return json_decode($response);
        }catch(Exception $e){
            return view('errorConsumeHoteles');
        }

    }

    public function consumeAPIQuery($method,$url,$queryArray){
        $credenciales=Credenciales::where('tipo','hoteles')->firstOrFail();

        try{
            $client = new Client([
                    // Base URI is used with relative requests
                'base_uri' => $credenciales->url,
                  // You can set any number of default request options.
                'timeout'  => 10.0,
            ]);
            $request=$client->get( $url, [
                        'query'=>$queryArray,
                        'headers'=> ['Authorization'=> 'Bearer '.$credenciales->accessToken,

                  ]
            ]);
            $request->getStatusCode();
            $response = $request->getBody();
            return json_decode($response);
        }catch(Exception $e){
            return view('errorConsumeHoteles');
        }

    }
}
