@extends('layouts.app')
@section('content')
   <main id="main" class="weblog">
       <div class="container">
           @foreach($weblog as $w)
               <div class="row">
                  <article>
                      <div class="card article-parent">
                          <div class="card-header">
                              ارسال شده در تاریخ:
                              {{$w->created_at->toJalali()->format('%d %B %Y')}}
                          </div>
                          <div class="card-body">
                              <h5 class="card-title">{{$w->title}}</h5>
                              <img src="/image/{{$w->img}}" class="card-img-top weblog-img" alt="{{$w->title}}">
                              <p class="card-text content-weblog-parent">{{Str::limit($w->content, 200)}}</p>
                              <div class="col-xs-12 ">
                                  <a href="{{route('weblog.detailWeblog',['id'=>$w->id,'weblogSlug'=>$w->slug])}}" class="btn btn-primary">ادامه مطالب</a>
                              </div>
                          </div>
                          <div class="card-footer text-muted">
                              ارسال شده توسط:
                              {{$w->author}}
                          </div>
                      </div>
                  </article>
               </div>
           @endforeach
           <div class="row">
               {!! $weblog->render() !!}
           </div>
           <div class="row">
               <article>
                   <div class="col-xs-12 form-group form-weblog-parent">
                       <div class="col-xs-12 title-weblog-post h5">
                           مطالب خواندنی خود را به اشتراک بگذارید.
                       </div>
                       <hr class="hr" />
                       <div class="col-xs-12">
                           @if(count($errors))
                               <div class="col-xs-12 alert alert-danger form-group">
                                   <ul>
                                       @foreach($errors->all() as $error)
                                           <li> {{$error}}</li>
                                       @endforeach
                                   </ul>
                               </div>
                           @endif

                       </div>
                       <div class="col-xs-12 form-weblog">
                           @if(\Illuminate\Support\Facades\Auth::check())
                                 <form method="post" action="{{route('weblog.send')}}" enctype="multipart/form-data">
                               {!! csrf_field() !!}
                               <div class="row form-parent">
                                   <div class="col-xs-12 form-group">
                                       <span class="red-star">*</span>
                                       <label class="form-label">نام و نام خانوادگی:</label>
                                       <input  name="author" class="form-control" type="text" alt="author" placeholder="نام شما">
                                   </div>
                                   <div class="col-xs-12 form-group">
                                       <span class="red-star">*</span>
                                       <label class="form-label">ایمیل:</label>
                                       <input  name="email" class="form-control" type="email" alt="email" placeholder="ایمیل">
                                   </div>
                                   <div class="col-xs-12 form-group">
                                       <span class="red-star">*</span>
                                       <label class="form-label">عنوان:</label>
                                       <input  name="title" class="form-control" type="text" alt="title" placeholder="عنوان">
                                   </div>
                                   <div class="col-xs-12 form-group">
                                       <span class="red-star">*</span>
                                       <label class="form-label"> متن:</label>
                                       <textarea  class="form-control" name="content" rows="5" placeholder="متن" ></textarea>
                                   </div>
                                   <div class="col-xs-12 form-group">
                                       <label for="exampleFormControlFile1">لطفا عکس ارسالی به فرمتهای jpg و png باشد</label>
                                       <input type="file" name="img" class="form-control-file" id="exampleFormControlFile1">
                                   </div>
                                   <div class="col-xs-12 form-group">
                                       <button type="submit" class="btn btn-primary">ارسال</button>
                                   </div>
                               </div>
                           </form>
                           @else
                                <div class="col-xs-12 alert alert-warning"> برای اضافه کردن مقاله نیاز به عضویت در سایت می باشد.</div>
                           @endif
                       </div>
                   </div>
               </article>
           </div>

       </div>
   </main>
@endsection
