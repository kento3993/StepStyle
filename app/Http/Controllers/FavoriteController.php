<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    

    public function store(Request $request, $product_id)
    {
        // ユーザーがログインしていない場合は、ログインページにリダイレクト
        if (!auth()->check()) {
            return redirect()->route('signin')->with('status', 'ログインが必要です。');
        }
    
        // 以下の処理はユーザーがログインしている場合のみ実行されます
    
        // ユーザーIDを取得
        $userId = auth()->id();
    
        // お気に入りが既に存在するかチェックし、存在すれば削除
        $favorite = Favorite::where('user_id', $userId)->where('product_id', $product_id)->first();
        if ($favorite) {
            $favorite->delete();
            $message = 'お気に入りから削除しました。';
        } else {
            Favorite::create([
                'user_id' => $userId,
                'product_id' => $product_id
            ]);
            $message = 'お気に入りに追加しました。';
        }
    
        // 商品詳細ページにリダイレクトし、メッセージをフラッシュデータとしてセット
        return back()->with('success', $message);
    }
    
    
    

}


