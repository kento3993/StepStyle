<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function showProductDetail(Request $request)
    {
        // POSTリクエストのデータを処理するロジックをここに記述します
        // フォームから送信されたデータは$requestオブジェクトを使用してアクセスできます

        // 例: 商品1の情報を取得
        $product1Name = $request->input('product1_name');
        $product1Price = $request->input('product1_price');
        $product1Description = $request->input('product1_description');

        // データをビューに渡す場合
        return view('product-detail', [
            'product1Name' => $product1Name,
            'product1Price' => $product1Price,
            'product1Description' => $product1Description,
        ]);
    }
}

