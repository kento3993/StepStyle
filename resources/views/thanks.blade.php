<?php




\Stripe\Stripe::setApiKey('sk_test_51OBesYEtOu60JJLT8g33WEVeibu2h2XO5b8BJrBBStIxEH2X3cWJKdOQK3eudIOJ2347Rd3Vv6BdkdXND2Pv7mfy00gFm6yKA6');

try {
    $stripeToken = $_POST['stripeToken'];

    $charge = \Stripe\Charge::create([
        'source' => $stripeToken,
        'amount' => 1000,
        'currency' => 'jpy',
    ]);
} catch (Error $e) {
    echo $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 
    <title>決済完了 - StepStyle</title>
</head>
<body>
    @include('header')

    <div class="container">
        <div class="content">
            <h1>決済が完了しました</h1>
            <p>ご注文ありがとうございます。注文が正常に処理されました。</p>
            <!-- ボタンにクラスを追加 -->
            <a href="{{ url('/') }}" class="button home-button">ホームに戻る</a>
        </div>
    </div>

    @include('footer')
</body>

<style>
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 30vh; /* ビューポートの高さに合わせてコンテンツを垂直方向に中央揃え */
    }
    .content {
        text-align: center; /* テキストを中央揃え */
    }
    /* ホームに戻るボタンのスタイル */
.home-button {
    display: block; /* ブロック要素として表示 */
    margin-top: 20px; /* 上の要素からのマージン */
    text-align: center; /* テキストを中央揃え */
    padding: 10px 20px; /* パディングを追加 */
    background-color: #4CAF50; /* 背景色 */
    color: white; /* 文字色 */
    text-decoration: none; /* テキストの装飾をなしに */
    border-radius: 5px; /* 角を丸く */
    transition: background-color 0.3s; /* 背景色の変化を滑らかに */
}

/* ホームに戻るボタンのホバー効果 */
.home-button:hover {
    background-color: #367c39; /* 背景色を暗く */
}

</style>
</html>