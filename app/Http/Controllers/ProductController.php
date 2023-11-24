<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;

class ProductController extends Controller
{
    public function index()
    {
        $products = products::all(); // すべての商品データを取得
        return view('product_management', compact('products')); // ビューにデータを渡す
    }

        public function edit(Products $product)
    {
        return view('product_edit', compact('product'));
    }


    public function destroy(Products $product)
    {
        $product->delete();
        return redirect()->route('product_management')->with('status', '商品が削除されました');
    }

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|max:255',
        'Price' => 'required|numeric',
        'Description' => 'required',
    ]);

    $products = Products::findOrFail($id);
    $products->name = $request->name;
    $products->Price = $request->Price;
    $products->Description = $request->Description;
    $products->save();
    $products = Products::all(); 

    return redirect()->route('product_management');

}

public function create()
{
    return view('products_create'); // 'products_create' は新しい商品を追加するビューnama。
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|max:255',
        'Price' => 'required|numeric',
        'Description' => 'required',
        'image' => 'required|image|max:2048', // 画像のバリデーション追加
    ]);

    // 画像のアップロード処理
    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('img'), $imageName);
    } else {
        $imageName = ''; // 画像がアップロードされなかった場合の処理
    }

    // 商品情報と画像名をデータベースに保存
    $product = new Products();
    $product->name = $request->name;
    $product->Price = $request->Price;
    $product->Description = $request->Description;
    $product->imageFileName = $imageName; // 画像の名前を保存
    $product->save();

    return redirect()->route('product_management')->with('success', '新しい商品が追加されました。');
}




public function show($id)
{
    $product = Products::findOrFail($id);
    return view('product_detail', compact('product'));
}

}
