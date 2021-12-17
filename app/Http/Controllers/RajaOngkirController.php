<?php

namespace App\Http\Controllers;

use App\Kota;
use App\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RajaOngkirController extends Controller
{ 
    private $key;
    private $api_url;

    public function __construct()
    {
        $this->api_url = 'https://api.rajaongkir.com/starter';
        $this->key     = ['key' => env('RAJAONGKIR_KEY')];  

    }

    public function apiRajaOngkir()
    {
        $provinces      = Http::withHeaders($this->key)->get($this->api_url.'/province');
        $province_json  = $provinces->object()->rajaongkir->results;

        foreach($province_json as $province){
            //store province 
            Provinsi::create([
                'id_provinsi'   => $province->province_id,
                'nama_provinsi' => $province->province
            ]);

            $cities = Http::withHeaders($this->key)->get($this->api_url.'/city', [
                'province' => $province->province_id
            ]);

            $cities_json = $cities->object()->rajaongkir->results;

            foreach ($cities_json as $city) {
                Kota::create([
                    'id_kota'       => $city->city_id,
                    'id_provinsi'   => $city->province_id,
                    'tipe'          => $city->type,
                    'nama_kota'     => $city->city_name,
                    'kodepos'       => $city->postal_code
                ]);
            }
        }

        return response()->json([
            'status'  => 200,
            'message' => "Ok"
        ]);
    } 

    public function getCost($origin, $destination, $weight){
        
        $data = [
            'origin'        => $origin,
            'destination'   => $destination,
            'weight'        => $weight,
            'courier'       => 'jne'
        ];

        $response = Http::asForm()
            ->withHeaders($this->key)
            ->post($this->api_url.'/cost', $data);

        //$data_ongkir = $response['rajaongkir']['results'][0]['costs'][1]['cost'][0];
        $data_ongkir = $response['rajaongkir']['results'];
        return response()->json($data_ongkir);
    } 
}
