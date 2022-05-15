@extends('layouts.app')
@section('content')
<!-- ======= Hero Section ======= -->
<main id="main">
    <div class="container">
        <article>
            <div class="col-xs-12 form-group form-weblog-parent">
                <div class="col-xs-12 title-weblog-post h5">
                    نظرات خود را با ما به اشتراک بگذارید.
                </div>
                <div class="row row-error">
                    @if(count($errors))
                        <div class="col-xs-12 alert alert-danger form-group">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>
                                        {{$error}}

                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if($msg_success)
                        <div class="col-xs-12 alert alert-success form-group">
                            {{$msg_success}}
                        </div>
                   @endif
                </div>
                <div class="row row-form">
            <form action="{{route('contactus.store')}}" method="post">
                {!! csrf_field() !!}
                <div class="row form-parent">
                    <div class="col-xs-12 form-group">
                        <span class="red-star">*</span>
                        <label class="form-label">نام و نام خانوادگی:</label>
                        <input  name="name" class="form-control" type="text" alt="name" placeholder="نام شما">
                    </div>
                    <div class="col-xs-12 form-group">
                        <span class="red-star">*</span>
                        <label class="form-label">ایمیل:</label>
                        <input  name="email" class="form-control" type="email" alt="email" placeholder="ایمیل">
                    </div>
                    <div class="col-xs-12 form-group">
                        <label class="form-label">موبایل:</label>
                        <input  name="mobile" class="form-control" type="text" alt="mobile" placeholder="شماره موبایل">
                    </div>
                    <div class="col-xs-12 form-group">
                        <span class="red-star">*</span>
                        <label class="form-label">نظرات:</label>
                        <textarea  class="form-control" name="comments" rows="5" placeholder="نظرات" ></textarea>

                    </div>
                    <div class="col-xs-12 form-group">
                        <button type="submit" class="btn btn-primary">ارسال</button>
                    </div>
                </div>
            </form>
        </div>
            </div>
        </article>
    </div>
</main><!-- End #main -->
@endsection
