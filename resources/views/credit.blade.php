<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/css/product-detail.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/css/header.css') }}">
    <script src="https://js.stripe.com/v3/"></script>
    <style>
    .stripe-input {
        width: 100%; /* 幅を100%に設定 */
        max-width: 500px; /* 最大幅を500pxに設定 */
        margin: 0 auto; /* 左右のマージンを自動にして中央に配置 */
        padding: 10px; /* パディングを設定 */
        border-radius: 4px; /* 角を丸くする */
        background-color: #f9f9f9; /* 背景色を設定 */
        border: 1px solid #ddd; /* 境界線を設定 */
    }
    </style>
    <title>StepStyle クレジット決済</title>
</head>

<body>

@include('header')

<form id="card-form" method="post" action="{{ route('thanks') }}">
    @csrf 
    <div class="form-row stripe-input" id="card-number"></div>
    <div class="form-row stripe-input" id="card-expiry"></div>
    <div class="form-row stripe-input" id="card-cvc"></div>
    <div id="card-errors"></div>
    <button>支払いをする</button>
</form>
<script>
    var stripe = Stripe('pk_test_51OBesYEtOu60JJLTqy2paMz82KxalKYS9V92xXtM5ecMlHQRv6RsYiIArqVcKNFaNo9VAyvWr71S2C7EyQ1FDcFZ00Pg4rSMVD');
    var elements = stripe.elements();

    var cardNumber = elements.create('cardNumber');
    cardNumber.mount('#card-number');
    cardNumber.on('change', function (event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    var cardExpiry = elements.create('cardExpiry');
    cardExpiry.mount('#card-expiry');
    cardExpiry.on('change', function (event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    var cardCvc = elements.create('cardCvc');
    cardCvc.mount('#card-cvc');
    cardCvc.on('change', function (event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    var form = document.getElementById('card-form');
    form.addEventListener('submit', function (event) {
        event.preventDefault();
        var errorElement = document.getElementById('card-errors');
        if (event.error) {
            errorElement.textContent = event.error.message;
        } else {
            errorElement.textContent = '';
        }

        stripe.createToken(cardNumber).then(function (result) {
            if (result.error) {
                errorElement.textContent = result.error.message;
            } else {
                stripeTokenHandler(result.token);
            }
        });
    });

    function stripeTokenHandler(token) {
        var form = document.getElementById('card-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);
        form.submit();
    }
    let p1_element = document.getElementById("card-cvc");

// p要素にCSSを適用
p1_element.style.setProperty("width", "800px");
p1_element.style.setProperty("margin", "center");
var aaa = document.getElementById("card-number");
aaa.style.setProperty("width", "800px");
aaa.style.setProperty("background-color", "#00000");
var bbb = document.getElementById("card-expiry");
bbb.style.setProperty("width", "800px");
bbb.style.setProperty("background-color", "#00000");
var ccc = document.getElementById("card-cvc");
ccc.style.setProperty("width", "800px");
ccc.style.setProperty("background-color", "#f6bfbc");

</script>

@include('footer')
</body>
</html>

