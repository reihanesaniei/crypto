<?php

namespace App\Http\Controllers;

use App\Models\Pricelist;
use App\Models\Weblog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pricelist = Pricelist::IndexPricelist();
        $newsprice = Weblog::IndexWeblog();
        $contentMain  = [
            'priceList'=>$pricelist,
            'newsprice'=>$newsprice
        ];

        return view('home',compact('contentMain'));
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('adminHome');
    }
}
