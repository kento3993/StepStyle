<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>清算 - StepStyle</title>
    <link rel="stylesheet" href="./css/css/checkout.css">
</head>

<body>
@include('header')

<div class="checkout-container">
    <h1>清算情報</h1>
    
    <form action="/process-payment" method="post">
        <div class="form-group">
            <label for="fullname">氏名:</label>
            <input type="text" id="fullname" name="fullname" required>
        </div>

        <div class="form-group">
            <label for="address">住所:</label>
            <textarea id="address" name="address" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="card-number">カード番号:</label>
            <input type="text" id="card-number" name="card-number" required>
        </div>

        <div class="form-group">
            <label for="expiry-date">有効期限:</label>
            <input type="text" id="expiry-date" name="expiry-date" placeholder="MM/YY" required>
        </div>

        <div class="form-group">
            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" name="cvv" required>
        </div>

        <button type="submit" class="checkout-btn">決済する</button>
    </form>
</div>

@include('footer')
</body>

</html>
