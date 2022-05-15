<?php

namespace App\Http\Controllers;

use App\Models\Suggestion;
use Illuminate\Http\Request;

class SuggestionController extends Controller
{
    //
    public function index(){
        $content = Suggestion::ShowCall();
        return view('suggestions',compact('content'));
    }
}
