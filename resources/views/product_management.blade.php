
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品管理画面</title>
    <link rel="stylesheet" href="./css/css/product_management.css">

</head>
@include('header')
<body>
    <div class="container">
        <h1>商品管理</h1>
        <a href="{{ route('product_create') }}" class="btn add">商品を追加</a>

        <table>
            <thead>
                <tr>
                    <th>商品ID</th>
                    <th>商品名</th>
                    <th>価格</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->Price }}</td>
                <td>
                <a href="{{ route('product_edit', $product->id) }}" class="btn edit">編集</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="post" style="display:inline;">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn delete" onclick="return confirm('本当に削除しますか？')">削除</button>
                </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    
</body>
@include('footer')
</html>
