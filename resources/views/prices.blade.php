@extends('layouts.master')
@section('content')
    <!-- ======= Hero Section ======= -->
    <main id="main">
        <div class="container">
            <div class="row">
                <table class="table table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">شماره</th>
                        <th scope="col">سمبل</th>
                        <th scope="col">نام ارز</th>
                        <th scope="col">قیمت (usd)</th>
                    </tr>
                    </thead>
                    <tbody>
                   <?php $counter = 0; ?>

                    @foreach($prices as $price)
                        <tr>

                            <th scope="row"><?php echo $counter++; ?></th>
                            <td>{{$price["id"]}}</td>
                            <td>{{$price["name"]}}</td>
                            <td>{{$price["current_price"]}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </main><!-- End #main -->
@endsection
