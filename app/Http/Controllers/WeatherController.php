<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function index(Request $request)
    {
        $weather = new Client();
        $res = $weather->get('http://api.openweathermap.org/data/2.5/weather?q=Hanoi&appid=1c709927dbee3c19b9ab37cd2a1a06a4');
        $data = $res->getBody();
        $dataJson = $data->getContents();
        $dataWeather = json_decode($dataJson);
//        dd($dataWeather);
        return view('homeWeather',compact('dataJson','dataWeather'));
    }

}
