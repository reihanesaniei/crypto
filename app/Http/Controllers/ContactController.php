<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function index(){
        $msg_success = '';
        return view('contactus',compact('msg_success'));
    }
    public function store(){

        $this->validate(request(),[
            'name'=>'required',
            'email'=>'required|email:rfc,dns',
            'comments'=>'required'
        ],[
            'name.required'=>'پر کردن فیلد نام الزامی است',
            'email.required'=>'پر کردن فیلد ایمیل الزامی است',
            'comments.required'=>'پر کردن فیلد نظرات الزامی است',
            'The email must be a valid email address'=>'فرمت ایمیل را رعایت نکرده اید'
        ]);
        $request = request()->all();
        $contact = new Contact();
        $contact->name = $request['name'];
        $contact->email = $request['email'];
        $contact->mobile = $request['mobile'];
        $contact->comments = $request['comments'];
        $contact->save();
        $msg_success = 'نظر شما با موفقیت ثبت شد.متشکریم';
        return view('contactus',compact('msg_success'));


    }
}
