
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/css/product-detail.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/css/header.css') }}">
    <title>StepStyle 商品詳細</title>
</head>
<body>

<header>
@include('header')
</header>


<div class="product-detail">
    <div class="product-image">
    <input type="image" src="./img/{{$product->imageFileName}}" alt="{{ $product->name }}">
    </div>
    <div class="product-info">
    <!-- ここで $product のプロパティを直接参照する -->
    <h2>{{ $product->name }}</h2>
    <p>{{ $product->Price }}円[税込み]</p>
    <p>{{ $product->Description }}</p>
</div>

    <div class="product-actions">
        <!-- お気に入りに追加するためのフォーム -->
        <form action="{{ route('favorite.store', $product->id) }}" method="post">
            @csrf
            <button type="submit" class="add-to-favorites">お気に入り</button>
        </form>
        <!-- カートに追加するためのフォーム -->
        <form action="{{ route('cart.store', $product->id) }}" method="post">
            @csrf
            <button type="submit" class="add-to-cart">カートに追加</button>
        </form>
    </div>
</div>

<!-- レビュー欄 -->

<div class="reviews-section">
    <h3>レビュー:</h3>
    <form action="{{ route('reviews.store') }}" method="post">
        @csrf <!-- CSRFトークン -->
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <textarea name="review" placeholder="レビューを入力してください" required></textarea>
        <button class="review2" type="submit">レビューを送信</button>
    </form>
    @if(isset($reviews) && $reviews->count())
        @foreach($reviews as $review)
            <div class="review">
                <p>{{ $review->content }}</p>
                <span>- {{ $review->name }}</span>
            </div>
        @endforeach
    @else
        <p>レビューはまだありません。</p>
    @endif
</div>



<footer>
@include('footer')
</footer>
@if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

</body>

</html>
