<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Weblog extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'author',
        'email',
        'slug',
        'img',
        'content'
    ];
    public function scopeIndexWeblog($query){

        return $query->latest()->take(20)->get();
    }

    public function scopeCreateWeblog(){
        $request = request();
        $request->validate([
            'title'=>'required',
            'author'=>'required',
            'email'=>'required',
            'img'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'content'=>'required'

        ],[
            'author.required'=>'پر کردن فیلد نویسنده الزامی است',
            'title.required'=>'پر کردن فیلد عنوان الزامی است',
            'email.required'=>'پر کردن فیلد ایمیل الزامی است',
            'content.required'=>'پر کردن فیلد متن الزامی است',
            'The email must be a valid email address.'=>'فرمت ایمیل را رعایت نکرده اید'

        ]);



        $input = $request->all();

        if ($image = $request->file('img')) {

            $destinationPath = 'image/';

            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

            $image->move($destinationPath, $profileImage);

            $input['img'] = "$profileImage";

        }
        $input['slug'] =Str::slug(request('title'));

       Weblog::create($input);
        return redirect()->route('weblog.index')

            ->with('success','Product created successfully.');
       /*

        Weblog::create([
            'title'=> request('title'),
            'author'=>request('author'),
            'email'=>request('email'),
            'slug'=>Str::slug(request('title')),
            'img'=>$imageName,
            'content'=>request('content')
        ]);*/

    }
    public function scopeDetailWeblog($query,$id,$slug){
        return $query->find($id);

    }

}
