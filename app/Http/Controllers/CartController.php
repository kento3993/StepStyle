<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Products; 


class CartController extends Controller
{
    public function store(Request $request, $product_id)
    {
        // ユーザーがログインしていない場合は、ログインページにリダイレクト
        if (!auth()->check()) {
            return redirect()->route('signin')->with('status', 'ログインが必要です。');
        }
    
        // ログインしているユーザーIDを取得
        $user_id = auth()->id();
    
        // カート内に商品が既に存在するかチェック
        $cart = Cart::where('user_id', $user_id)->where('product_id', $product_id)->first();
    
        if ($cart) {
            // カートに商品が既に存在する場合の処理
        } else {
            // カートに商品が存在しない場合は新しいカートアイテムを作成
            Cart::create([
                'user_id' => $user_id,
                'product_id' => $product_id,
            ]);
        }
    
        return back()->with('success', '商品をカートに追加しました。');
    }
    

    public function cart() {
        // ユーザーがログインしていない場合は、ログインページにリダイレクト
        if (!auth()->check()) {
            return redirect()->route('signin')->with('status', 'ログインが必要です。');
        }
    
        $user = auth()->user();
        $cartItems = $user->carts()->with('product')->get();
    
        // カートが空の場合は、ホームページにリダイレクト
        if ($cartItems->isEmpty()) {
            return redirect()->route('home')->with('status', 'カートに何も入っていません。');
        }
    
        $favoriteItems = $user->favorites()->with('product')->get();
    
        return view('cart', compact('cartItems', 'favoriteItems'));
    }
    
    public function remove($id)
    {
        // 指定されたIDを持つカートアイテムを取得し削除
        $cartItem = Cart::find($id);
        if ($cartItem) {
            $cartItem->delete();
        }
    
        // リダイレクトしてカートページに戻る
        return back()->with('success', '商品をカートから削除しました。');
    }
    
    
}

