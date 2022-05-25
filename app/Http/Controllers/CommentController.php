<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Weblog;


class CommentController extends Controller
{
    //
    public function index($id,$weblogslug){
        $message =Comment::CreatedComment($id,$weblogslug);
        $weblog  = Weblog::DetailWeblog($id,$weblogslug);
        $listComments =Comment::CommentList($id);
        return view('weblogdetail',compact('weblog','listComments','message'));
    }
}
