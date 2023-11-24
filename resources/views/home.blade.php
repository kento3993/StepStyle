<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>StepStyle</title>
    <link rel="stylesheet" href="./css/css/style.css" >
    <link rel="stylesheet" type="text/css" href="./css/css/reset.css">
    <link rel="stylesheet" type="text/css" href="./css/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="./jquery-3.6.4.min.js"></script>
    <script src="js/script.js"></script>
</head>

<body> 
@include('header')
<main>
<section class="products-grid">
    @foreach($products as $product)
        <form method="GET" action="{{ route('product_detail') }}">
        @csrf 
            <div class="box">
                <div class="info">
                <div class="photo">
                    <input type="image" src="./img/{{$product->imageFileName}}" alt="{{ $product->name }}">
                </div>
                    <div class="access">
                        <p class="area">
                            <p>{{ $product -> name }}</p>
                        </p>
                        <p class="distance">
                            <p>{{ $product -> Price }}円[税込み]</p>
                        <p class="distance">
                            <p>{{ $product -> Description }}</p>
                    </div>
                </div>
            </div>
        <input type="hidden" name="id" value="{{ $product -> id }}">
    </form>

    @endforeach
    </section>
    </main>
    <div class=PageNation>{{ $products->links('pagination::bootstrap-4') }}</div>
</div>
<footer class="site-footer">
    @include('footer')
</footer>

</body>
</html>