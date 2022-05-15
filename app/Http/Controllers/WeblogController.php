<?php

namespace App\Http\Controllers;

use App\Models\Weblog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Hekmatinasser\Verta\Verta;


class WeblogController extends Controller
{
    //
    public function index(){

        $weblog = Weblog::IndexWeblog();
        return view('weblog',compact('weblog'));
    }
    public function send(){

       Weblog::CreateWeblog();
        return redirect('/weblog');

    }
    public function detailWeblog($id,$weblogslug){
        $weblog  = Weblog::DetailWeblog($id,$weblogslug);
        return view('weblogdetail',compact('weblog'));
    }
    public function delete($id){
        $w = Weblog::destroy($id);
        return redirect('/weblog');
    }

}
