<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Suggestion extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function scopeShowCall()    {
       return DB::table('calls')
            ->join('customer','calls.phone','=','customer.phone')
            ->join('team','calls.teamCode','=','team.teamCode')
            ->select('customer.name','team.name as tname','calls.message')
            ->get();


    }

}
