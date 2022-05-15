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
       </div>
   </main>
@endsection
