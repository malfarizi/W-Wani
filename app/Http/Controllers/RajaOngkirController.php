<?php

namespace App\Http\Controllers;

use App\Provinsi;
use App\Kota;
use Illuminate\Http\Request;

//guzzle
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class RajaOngkirController extends Controller
{ 
    public function apiRajaOngkir(){
        $client = new Client();
        $result = $client->request('GET', 
            'https://api.rajaongkir.com/starter/province', [
                'query' => [
                    'key'   => '7f4acdf11c42f0677ee7bc41bc4bbb23'
                ]
        ]);
        $response = json_decode($result->getBody());
        foreach($response as $key => $data){
            for($i = 0; $i < sizeof($data->results); $i++){
                //store province
                $provinsi = new Provinsi;
                $provinsi->id_provinsi = $data->results[$i]->province_id;
                $provinsi->nama_provinsi = $data->results[$i]->province;
                $provinsi->save();

                $result2 = $client->request('GET', 
                    'https://api.rajaongkir.com/starter/city', [
                        'query' => [
                            'key'         => '7f4acdf11c42f0677ee7bc41bc4bbb23',
                            'province'    => $i+1
                        ]
                ]);

                $res = json_decode($result2->getBody());

                foreach ($res as $key => $value) {
                    for($x = 0; $x < sizeof($value->results); $x++){
                        //store city
                        $kota = new Kota;
                        $kota->id_kota      = $value->results[$x]->city_id;
                        $kota->id_provinsi  = $value->results[$x]->province_id;
                        $kota->tipe         = $value->results[$x]->type;
                        $kota->nama_kota    = $value->results[$x]->city_name;
                        $kota->kodepos      = $value->results[$x]->postal_code;
                        $kota->save();
                    }
                }
            }
        }
    } 

    public function getCost($origin, $destination, $weight, $courier){
        $client = new Client();
        $options = [
            'headers' => [
                'key'           => '7f4acdf11c42f0677ee7bc41bc4bbb23',
                'content-Type'  => 'application/x-www-form-urlencoded',
            ],
            'form_params' => [
                'origin'        => $origin,
                'destination'   => $destination,
                'weight'        => $weight,
                'courier'       => $courier
            ]
        ];
        $result      = $client->post('https://api.rajaongkir.com/starter/cost', $options);
        $response    = json_decode($result->getBody()->getContents(), true);
        $data_ongkir = $response['rajaongkir'];
        return response()->json($data_ongkir);
    } 
}
