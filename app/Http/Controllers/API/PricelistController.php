<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pricelist;

class PricelistController extends Controller
{

    public function index(){
        try {
            $pricelist = Pricelist::IndexPricelist();
            Pricelist::StorePricelist();

        } catch(\Illuminate\Http\Client\ConnectionException $e)
        {
            $pricelist = array();
        }
        return view('pricelist',compact('pricelist'));
    }

}
