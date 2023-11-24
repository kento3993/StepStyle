<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>買い物かご - StepStyle</title>
    <link rel="stylesheet" href="{{ asset('css/css/cart.css') }}">
</head>

<body>
@include('header')
<div class="content-wrap">
    <div class="cart-container">

        <!-- 商品リスト -->
        @php $totalPrice = 0; @endphp
        @foreach ($cartItems as $item)
        <div class="cart-item">
            <!-- 削除ボタン -->
            <form class="RemoveButton" action="{{ route('cart.remove', $item->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-delete">削除</button>
            </form>
            <span class="product-name">{{ $item->product->name }}</span>
            <span class="product-price">¥{{ number_format($item->product->Price) }}</span>
        </div>
        @php $totalPrice += $item->product->Price; @endphp
        @endforeach

        <!-- 合計金額 -->
        <div class="cart-total">
            <span>合計: </span>
            <span>¥{{ number_format($totalPrice) }}</span>
        </div>
        <!-- 決済ボタン -->
        <div class="checkout-button">
            <a href="{{ route('credit.index') }}" class="credit">決済する</a>
        </div>

        <!-- お気に入り商品リスト -->
        <div class="favorites-container">
    <p>お気に入りリストはこちら</p>
    @foreach ($favoriteItems as $favorite)
        <div class="favorite-item">
            <!-- 商品詳細ページへのリンクに商品IDを渡す -->
            <a href="{{ route('product_detail', ['id' => $favorite->product->id]) }}">{{ $favorite->product->name }}</a>
        </div>
    @endforeach
</div>
    </div>
</div>
@include('footer')

</body>
</html>
