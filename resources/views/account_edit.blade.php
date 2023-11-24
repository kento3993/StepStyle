<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('./css/css/account_edit.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/css/signup.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/css/contact.css') }}">

    <title>アカウント編集確認</title>

</head>
@include('header')
<form action="{{ route('account_update') }}" method="POST">
    

    @csrf
    @method('PUT') 
    <div class="contact_box">
    <dl>
        <dt>
            <label for="name">氏名</label>
            <span class="required">*</span>
        </dt>
        <dd>
            <!-- nameフィールド -->
            <input type="text" name="name" id="name" maxlength="50" placeholder="山田太郎" value="{{ old('name', $user->name) }}" required>
        </dd>
        <dt>
            <label for="email">メールアドレス</label>
            <span class="required">*</span>
        </dt>
        <dd>
            <!-- emailフィールド -->
            <input type="email" name="email" id="email" placeholder="text@text.co.jp" value="{{ old('email', $user->email) }}" required>
        </dd>
        <dt>
            <label for="password">パスワード</label>
            <span class="required">*</span>
        </dt>
        <dd>
            <!-- passwordフィールド -->
            <input type="password" name="password" id="password" minlength="6" placeholder="新しいパスワードを入力（変更する場合）">
            <!-- パスワードはセキュリティ上、事前に入力されている状態にはしません -->
        </dd>
    </dl>
    <div id="center">
        <button type="submit" class="send">アカウント編集を保存</button>
    </div>
    </div>
</form>

