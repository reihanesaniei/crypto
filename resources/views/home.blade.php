@extends('layouts.app')

@section('content')
    <main id="main">

   {{--     <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Dashboard') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            {{ __('You are logged in!') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>--}}
        <div class="container content-main">
            <div class="row">
                        <div class="col-xs-12 col-sm-6 news-price">
                    @foreach($contentMain['newsprice'] as $w)
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
                                        <p class="card-text content-weblog-parent">{{Str::limit($w->content, 100)}}</p>
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
                </div>
                <div class="col-xs-12 col-sm-6 rate-price">

                    <table class="table table-striped table-price-dir">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">شماره</th>
                            <th scope="col">نام ارز</th>
                            <th scope="col">قیمت اکنون(دلار)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $counter = 1;
                        ?>
                        @foreach($contentMain['priceList'] as $price)
                            <tr>
                                <th scope="row"><?php echo $counter++; ?></th>
                                <td>
                                    <img src="{{$price["image"]}}" width="25" height="25">
                                    <span>
                                    {{$price["name"]}}
                                </span>
                                    <span class="symbol-price">
                                    {{$price["symbol"]}}
                                </span>

                                </td>

                                <td>{{$price["current_price"]}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </main><!-- End #main -->


@endsection
