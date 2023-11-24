

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
        <a href="{{ url('/') }}" class="button">ホームに戻る</a>
    </div>
</div>

@include('footer')

</body>
</html>
