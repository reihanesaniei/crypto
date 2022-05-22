<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        $input['content'] = $request['content'];

        Comment::create($input);
        $message = 'نظرات شما با موفقیت ثبت شد.';

        return  $message;


    }
}
