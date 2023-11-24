<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\products;
use App\Models\Review;

class HomeController extends Controller
{
    private $shoes;


    public function index() {
            // Product モデルからデータを取得
    $products = Products::orderBy('id' , 'desc')->paginate(6);
    // 商品を最新から古い順に並べ替え、1ページあたり6つの商品を表示するようにページネーションを適用する
    
    // ビューにデータを渡す
    return view('home', ['products' => $products]);
    }

    public function product() {
        return view('product_detail');
    }

    public function signin() {
        return view('signin');
    }

    public function signup() {
        return view('signup');
    }



    public function checkout() {
        return view('checkout');
    }

    public function error() {
        return view('error');
    }

    public function registration_confirmation() {
        return view('registration_confirmation');
    }

    public function order_completed() {
        return view('order_completed');
    }

    public function account_edit() {
        return view('account_edit');
    }
    
    public function account_edit_confirm() {
        return view('account_edit_confirm');
    }

    public function product_management() {
        return view('product_management');
    }

    public function product_edit() {
        return view('product_edit');
    }
    

    // public function showProductDetail($id)
    // {
    //     $product = Products::WHERE('ProductID','=',$id)->get();
    //     if (!$product) {
    //         abort(404);
    //     }
    //     return view('product_detail', compact('product'));
    // }

    public function showProductDetail()
    {
        $id = $_GET['id'];
        $product = Products::where('id', $id)->first(); // 単一の商品インスタンスを取得
        $reviews = Review::select('reviews.id','product_id', 'user_id', 'content' ,  'reviews.created_at','users.name')
        ->where('reviews.product_id','=',$id)
        ->join('users','users.id','=','reviews.user_id')
        ->orderBy('reviews.created_at', 'desc')
        ->get();

        
        if (!$product) {
            abort(404); 
        }

        

        // $product と $id をビューに渡す
        return view('product_detail', compact('product', 'id' , 'reviews'));
    }
    

} 
