@extends('layouts.master')
@section('content')
   <main id="main" class="weblog">
       <div class="container">
           <div class="row">
               <article>
                   <div class="card article-parent">
                       <div class="card-header">
                           ارسال شده در تاریخ:
                           {{$weblog->created_at->toJalali()->format('%d %B %Y')}}
                       </div>
                       <div class="card-body">
                           <h5 class="card-title">{{$weblog->title}}</h5>
                           <img src="/image/{{$weblog->img}}" class="card-img-top weblog-img-detail" alt="{{$weblog->title}}">
                           <p class="card-text content-weblog-parent">{{$weblog->content}}</p>
                       </div>
                       <div class="card-footer text-muted">
                           ارسال شده توسط:
                           {{$weblog->author}}
                       </div>
                   </div>
               </article>
           </div>

           @if(count($listComments)>0)
           <div class="row">
               <article>
                   <div class="card comment-parent">
                       <div class="col-xs-12 title-weblog-post h5">
                          <i class="fa fa-comments-o"></i> نظرات کاربران
                       </div>
                       @foreach($listComments as $list)
                           <div class="card-footer text-muted">
                               <div class="fr-name">
                                   {{$list->user_name}}
                               </div>
                               <div class="fl-date">
                                   {{jdate($list->created_at)->format('%d %B %Y')}}
                               </div>
                               <h5 class="card-title">
                                   <i class="fa fa-commenting"></i>
                                   {{$list->content}}
                               </h5>
                           </div>

                       @endforeach
                   </div>
               </article>
           </div>
           @endif
           <div class="row">
               <article>
                   <div class="col-xs-12 form-group form-weblog-parent">
                       <div class="col-xs-12 title-weblog-post h5">
                           نظرات خود را در مورد مقاله ی مذکور با مابه اشتراک بگذارید.
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
                           @if($message)
                               <div class="alert alert-success">
                                  {{$message}}
                               </div>
                           @endif

                       </div>
                       <div class="col-xs-12 form-weblog">
                           @if(\Illuminate\Support\Facades\Auth::check())
                               <form method="post" action="/weblog/{{$weblog->id}}/{{$weblog->slug}}" >
                                   {!! csrf_field() !!}
                                   <div class="row form-parent">
                                       <div class="col-xs-12 form-group">
                                           <span class="red-star">*</span>
                                           <label class="form-label"> نظرات:</label>
                                           <textarea  class="form-control" name="content" rows="5" placeholder="نظرات" ></textarea>
                                       </div>

                                       <div class="col-xs-12 form-group">
                                           <button type="submit" class="btn btn-primary">ارسال</button>
                                       </div>
                                   </div>
                               </form>
                           @else
                                <div class="col-xs-12 alert-danger">برای ارسال نظر در برای مقاله نیاز به عضویت در سایت می باشد</div>
                           @endif
                       </div>
                   </div>
               </article>
           </div>
       </div>
   </main>
@endsection
