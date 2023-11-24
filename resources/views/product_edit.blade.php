<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品編集画面</title>
    <link rel="stylesheet" href="{{ asset('css/css/product_edit.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/css/header.css') }}">
</head>

<script>
    // ハンバーガー
    $(function() {
        $('.sp img').click(function() {
            $('.side_menu').toggleClass('active');
        });
    }); 
</script>

<nav>
    <div class="g_nav">
        <div class="menu start _click start_cafe">
            <a href="{{ route('signin') }}">ログイン</a>
        </div>
        <div class="menu exp _click start_exp">
            <a href="{{ route('home') }}">ホームページ</a>
        </div>
        <div class="menu">
            <a href="{{ route('cart') }}">買い物かご</a>
        </div>
    </div>

    <div class="sign">

        <div class="sign_up _click">
            <a href="{{ route('signup')}}">サインアップ</a>
        </div> 
        <div class="sp _click">
            <img src="./img/menu.png" alt="">
        </div>
    </div>
    <div class="side_menu none">
        <ul>
            <li class="menu start _click"><a href="{{ route('product_management')}}">管理画面</a></li>
            <li class="menu exp _click"><a href="{{ route('account_edit')}}">アカウント編集</a></li>
        </ul>
    </div>
</nav>
<body>
    <div class="container">
        <?php

        ?>
        <h1>商品編集</h1>
        <form action="{{ route('product_update', $product->id) }}" method="POST">
            
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="productName">商品名:</label>
                <input type="text" id="productName" name="name" value="{{ old('name', $product->name) }}" placeholder="商品名を入力" required>
            </div>
            <div class="form-group">
                <label for="Price">価格:</label>
                <input type="text" id="Price" name="Price" value="{{ old('Price', $product->Price) }}" placeholder="価格を入力" required>
            </div>
            <div class="form-group">
                <label for="description">商品説明:</label>
                <textarea id="Description" name="Description" rows="4" placeholder="商品説明を入力">{{ old('Description', $product->Description) }}</textarea>
            </div>
            <button type="submit" class="btn submit">更新</button>
        </form>

    </div>
</body>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
</html>
