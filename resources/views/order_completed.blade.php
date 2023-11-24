<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>購入完了</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .message {
            font-size: 1.5em;
            margin-bottom: 20px;
        }

        .home-link {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .home-link:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="message">
            ご購入ありがとうございます！
        </div>
        <a href="/" class="home-link">ホームに戻る</a>
    </div>
</body>
</html>
