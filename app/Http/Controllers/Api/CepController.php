<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Instagram;
use App\Models\InstagramProfessional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpKernel\Exception\HttpException;


class CepController extends Controller
{
    public function index($ceps, Request $request)
    {

        if (empty($ceps)) {
            throw new HttpException(400, 'Must send values in request');
        } 

        $values = explode(',', $ceps);

        $responseFormatted = [];

        foreach($values as $cep) {
            $cep = str_replace('-', '', $cep);

            $pattern = '/^\d{8}$/';

            $isValid = false;

            if (preg_match($pattern, $cep)) {
                $isValid = true;
            }

            if ($isValid) {

                $result = Http::get(env('API_CEP_BASE_URL'). $cep .'/json')->json();

                $dataFormatted = [
                    "cep" => $result['cep'],
                    "label" => $result['logradouro'] . ', ' . $result['localidade'],
                    "logradouro" => $result['logradouro'],
                    "complemento" => $result['complemento'],
                    "bairro" => $result['bairro'],
                    "localidade" => $result['localidade'],
                    "uf" => $result['uf'],
                    "ibge" => $result['ibge'],
                    "gia" => $result['gia'],
                    "ddd" => $result['ddd'],
                    "siafi" => $result['siafi']
                ];

                array_push($responseFormatted, $dataFormatted);
            }
            
        }
        return response()->json($responseFormatted);
    }
}