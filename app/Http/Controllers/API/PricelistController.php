<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pricelist;

class PricelistController extends Controller
{

    public function index(){
        $pricelist = Pricelist::IndexPricelist();
        Pricelist::StorePricelist();
        return view('pricelist',compact('pricelist'));
    }

}
