@extends('layouts.app')
@section('content')
    <!-- ======= Hero Section ======= -->
    <main id="main">
        <div class="container">
            <div class="row">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">count</th>
                        <th scope="col">name customer</th>
                        <th scope="col">name team</th>
                        <th scope="col">message</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $counter = 0; ?>

                    @foreach($content as $c)
                        <tr>
                            <th scope="row"><?php echo $counter++; ?></th>
                            <td>{{$c->name}}</td>
                            <td>{{$c->tname}}</td>
                            <td>{{$c->message}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </main><!-- End #main -->
@endsection
