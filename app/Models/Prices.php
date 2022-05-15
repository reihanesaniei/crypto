<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prices extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'symbol',
        'current_price'
    ];
    public function savePrices($prices){

        foreach ($prices as $price){

            Prices::create([
                'name'=>$price["name"],
                'symbol'=>$price["symbol"],
                'current_price' =>$price["current_price"]
            ]);
        }

        return view('prices',compact('prices'));

    }
}
