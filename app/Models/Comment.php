<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;



class Comment extends Model
{
    use HasFactory;
    protected $guarded = ['created_at','updated_at'];

    public function scopeCreatedComment($query,$id,$slug){

        $request = request();
        $request->validate([
            'content'=>'required'
        ]);
        $input['user_id'] = auth()->user()->getAuthIdentifier();
        $input['weblog_id'] = (int)$id;
        $input['confirm'] = false;
        $input['content'] = $request['content'];

        Comment::create($input);
        $message = 'نظرات شما با موفقیت ثبت شد.';

        return  $message;
    }
    public function scopeCommentList($query,$weblog_id){
        $w_id = (int)$weblog_id;
        $lists = DB::table('comments')
            ->join('users','users.id','=','comments.user_id')
            ->select('comments.*','users.name as user_name')
            ->where('comments.weblog_id','=',$w_id)
            ->where('comments.confirm','=',true)->get();

        /*$lists = DB::table('comments')->select()->where('weblog_id','=',$w_id)
            ->where('confirm','=',true)->get();*/
        return $lists;
    }
}
