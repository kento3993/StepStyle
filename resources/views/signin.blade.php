<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="./css/css/contact.css">
    <link rel="stylesheet" type="text/css" href="./css/css/signup.css">

    <title>アカウントログイン</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body id="app">
    <header>
        @include ('header')
    </header>

    <section>
        <div class="contact_box">
            <h2>アカウントログイン</h2>
            <form action="{{ route('signin') }}" method="post">
                @csrf

                <dl>
                    <dt>
                        <label for="email">メールアドレス</label>
                        <span class="required">*</span>
                    </dt>
                    <dd>
                        <input type="email" name="email" id="email" placeholder="text@text.co.jp" required>
                        @error('email')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </dd>
                    <dt>
                        <label for="password">パスワード</label>
                        <span class="required">*</span>
                    </dt>
                    <dd>
                        <input type="password" name="password" id="password" minlength="6" required>
                    </dd>
                </dl>
                <div id="center">
                    <button type="submit" class="send">ログイン</button>
                    <a href="{{ route('password_reset') }}" class="forgot-password">パスワードを忘れた方はこちら</a>
                </div>
            </form>
        </div>
    </section>
    @include('footer')
</body>
</html>

