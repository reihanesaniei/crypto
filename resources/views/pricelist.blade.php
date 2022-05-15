@extends('layouts.app')
@section('content')
    <!-- ======= Hero Section ======= -->
    <main id="main">

        <div class="container">
            <div class="row">
                <table class="table table-striped table-price-dir">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">شماره</th>
                        <th scope="col">نام ارز</th>
                        <th scope="col">بالاترین قیمت در 24 ساعت(دلار)</th>
                        <th scope="col">پایین ترین قیمت در 24 ساعت(دلار)</th>
                        <th scope="col">قیمت اکنون(دلار)</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $counter = 1;
                    ?>
                    @foreach($pricelist as $price)
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

                            <td>{{$price["high_24h"]}}</td>
                            <td>{{$price["low_24h"]}}</td>
                            <td>{{$price["current_price"]}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </main><!-- End #main -->
    <script>
        function fetchdata(){
            $.ajax({
                url: '/api/pricelist',
                type: 'get',
                success: function(response){
                    $("#body").html('');
                    $("#body").html(response);
                }
            });
        }

        $(document).ready(function(){
            setInterval(fetchdata,15000);
        });

    </script>
@endsection
