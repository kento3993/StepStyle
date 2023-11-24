    // Elementsを使用してカードエレメントのインスタンスを作成
    var stripe = Stripe('pk_test_51OBesYEtOu60JJLTqy2paMz82KxalKYS9V92xXtM5ecMlHQRv6RsYiIArqVcKNFaNo9VAyvWr71S2C7EyQ1FDcFZ00Pg4rSMVD');  // Stripe公開可能キーを設定
    var elements = stripe.elements();
    // スタイルオプションを定義
    var style = {
        base: {
            fontSize: '16px',
            color: '#32325d',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };

    // カード番号のElementを作成
    var cardNumber = elements.create('cardNumber', {style: style});
    cardNumber.mount('#card-number');

    // 有効期限のElementを作成
    var cardExpiry = elements.create('cardExpiry', {style: style});
    cardExpiry.mount('#card-expiry');

    // CVCのElementを作成
    var cardCvc = elements.create('cardCvc', {style: style});
    cardCvc.mount('#card-cvc');

    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        stripe.createToken(cardNumber).then(function(result) {
            if (result.error) {
                // エラーを表示
                
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // トークンをサーバに送信
                
                stripeTokenHandler(result.token);
            }
        });
    });

    // トークンをサーバに送信する関数
    function stripeTokenHandler(token) {
        // トークンIDを隠しフィールドに挿入
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);
        // フォームを送信
        form.submit();
    }