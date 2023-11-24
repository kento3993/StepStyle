<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('./css/css/contact.css') }}">
    <title>パスワードリセット</title>
</head>
<body>
@include('header')

<div class="contact_box">
    <h2>パスワードリセット</h2>
    <form action="{{ route('password_reset_action') }}" method="POST">
        @csrf
        <dl>
            <dt><label for="name">氏名</label><span class="required">*</span></dt>
            <dd><input type="text" name="name" id="name" maxlength="50" placeholder="山田太郎" required></dd>

            <dt><label for="email">メールアドレス</label><span class="required">*</span></dt>
            <dd><input type="email" name="email" id="email" placeholder="text@text.co.jp" required></dd>

            <dt><label for="new_password">新しいパスワード</label><span class="required">*</span></dt>
            <dd><input type="password" name="new_password" id="new_password" minlength="6" required></dd>
        </dl>
        <div id="center"><button type="submit" class="send">パスワードをリセット</button></div>
    </form>
</div>

@include('footer')
</body>
</html>
