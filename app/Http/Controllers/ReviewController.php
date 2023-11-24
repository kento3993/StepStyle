<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;


class ReviewController extends Controller
{
    
    public function store(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('signin')->with('status', 'ログインが必要です。');
        }
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'review' => 'required|max:1000',
        ]);
        $review = new Review;
        $review->product_id = $request->product_id;
        $review->user_id = Auth::id();
        $review->content = e($request->review);
        $review->save();

        return back()->with('success', 'レビューを投稿しました。');
    }
    

    public function show($productId)
    {
    // レビューのデータを取得する
    $reviews = Review::where('product_id', $productId)->get();

    // レビューデータをビューに渡す
    return view('product-detail', ['reviews' => $reviews]);
    }
}
