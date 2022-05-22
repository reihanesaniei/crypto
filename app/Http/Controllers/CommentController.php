<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Weblog;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function index($id,$weblogslug){

        $message =Comment::CreatedComment($id,$weblogslug);
        $weblog  = Weblog::DetailWeblog($id,$weblogslug);

        return view('weblogdetail',compact('weblog','message'));

    }


}
