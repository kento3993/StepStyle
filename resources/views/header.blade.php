<link rel="stylesheet" type="text/css" href="./css/css/reset.css">
<link rel="stylesheet" href="./css/css/style.css" >
<link rel="stylesheet" type="text/css" href="./css/css/header.css">
<link rel="stylesheet" href="{{ asset('./css/css/header.css') }}">
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="js/script.js"></script>

<script>
    // ハンバーガー
    $(function() {
        $('.sp img').click(function() {
            $('.side_menu').toggleClass('active');
        });
    }); 
</script>

<nav class=header-nav>
    <a href="">
        <img class="icon" src="{{ asset('./img/title.jpg') }}" alt="cafe-cafe">
    </a>
    <div class="g_nav">
        <div class="menu start _click start_cafe">
            <a href="{{ route('signin') }}">ログイン</a>
        </div>
        <div class="menu exp _click start_exp">
            <a href="{{ route('home') }}">ホームページ</a>
        </div>
        <div class="menu">
            <a href="{{ route('cart') }}">買い物かご＆お気に入り</a>
        </div>
    </div>

    <div class="sign">
        @if(auth()->check())
            <!-- ユーザーがログインしている場合 -->
            <div class="user_name _click">
                {{ auth()->user()->name }} <!-- ユーザー名の表示 -->
            </div>
            <div class="sign_out _click">
                <a href="{{ route('signout') }}">サインアウト</a> <!-- サインアウトリンク -->
            </div>
        @else
            <!-- ユーザーがログインしていない場合 -->
            <div class="sign_up _click">
                <a href="{{ route('signup') }}">サインアップ</a>
            </div>
        @endif
        <div class="sp _click">
            <img src="{{ asset('./img/menu.png') }}" alt="">
        </div>
    </div>
    <div class="side_menu none">
        <ul>
            <li class="menu start _click"><a href="{{ route('product_management')}}">管理画面</a></li>
            <li class="menu exp _click"><a href="{{ route('account_edit')}}">アカウント編集</a></li>
        </ul>
    </div>
</nav>

<script>

    $(document).ready(function() {
    // 管理者情報の設定
    var adminName = '管理者権限';
    var adminEmail = 'kannrisya@gmail.com';

    // 管理画面ボタンにクリックイベントを追加
    $("a[href='{{ route('product_management') }}']").on('click', function(e) {
        var currentUser = {
            name: "{{ auth()->user()->name ?? '' }}",
            email: "{{ auth()->user()->email ?? '' }}"
        };

        if (currentUser.name !== adminName || currentUser.email !== adminEmail) {
            e.preventDefault(); // デフォルトのリンク動作をキャンセル
            window.location.href = "{{ route('home') }}"; // 商品一覧ページへリダイレクト
        }
    });
});

</script>

