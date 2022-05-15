<?php

namespace App\Http\Controllers;

use App\Http\Resources\Prices;
use Illuminate\Http\Request;
use Codenixsv\CoinGeckoApi\CoinGeckoClient;

use Ixudra\Curl\Facades\Curl;
use Symfony\Component\HttpFoundation\Response;

class PricesController extends Controller
{
    public function index(){
        $client = new CoinGeckoClient();
        $data = $client->derivatives()->getExchanges();
        $response = $client->getLastResponse();
        $headers = $response->getHeaders();
        $price_curl =  Curl::to('https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=10&page=1&sparkline=false&price_change_percentage=15s')
            ->get();
        $prices_obj = json_decode($price_curl);
       foreach ($prices_obj as $p){
           $prices[] = (array)($p);
       }

       \App\Models\Prices::savePrices($prices);

        return view('prices',compact('prices'));

    }
}
