<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        $api = curl_init("https://pokeapi.co/api/v2/pokemon?offset=0&limit=150");
        curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($api);
        curl_close($api);
        $json = json_decode($response);
        return view('index', compact(['json']));
    }

    public function pokemon($id)
    {
        $api = curl_init("https://pokeapi.co/api/v2/pokemon/$id");
        curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($api);
        curl_close($api);
        $json = json_decode($response);
        return view('pokemon', compact(['json']));
    }

    public function pesquisa()
    {
        $key = $_GET['key'];
        $pokemon = $key;

        $api = curl_init("https://pokeapi.co/api/v2/pokemon/$pokemon");
        curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($api);
        curl_close($api);
        if ($json = json_decode($response)) {
            return view('pesquisa', compact(['json']));
        } else {
            $tipo = curl_init("https://pokeapi.co/api/v2/type/$pokemon");
            curl_setopt($tipo, CURLOPT_RETURNTRANSFER, true);
            $resposta = curl_exec($tipo);
            curl_close($tipo);

            if ($json = json_decode($resposta)) {
                return view('pesquisatype', compact(['json']));
            }

            else {
                return view('erro', compact(['key']));
            }
        }
    }
}
