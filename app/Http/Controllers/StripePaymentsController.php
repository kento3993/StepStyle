<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Stripe\StripeClient;
use Stripe\Exception\ApiErrorException;
use App\Models\Cart;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;

class StripePaymentsController extends Controller
{
    protected $stripe;

    public function __construct()
    {   
        $this->stripe = new StripeClient(config('services.stripe.secret'));
    }

    public function create()
    {
        return view('payment.create');
    }

    public function index()
    {
        return view('credit');
    }

    public function payment(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.stripe_secret_key'));
        try
        {
            
            $customer = $this->stripe->customers->create([
                'email' => $request->stripeEmail,
                'source' => $request->stripeToken
            ]);

            $charge = $this->stripe->charges->create([
                'customer' => $customer->id,
                'amount' => 2000,
                'currency' => 'jpy'
            ]);

            return redirect()->route('payment_complete');
        }
        catch(ApiErrorException $e)
        {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function complete()
    {
          // ログインしているユーザーIDを取得
    $user_id = auth()->id();

    // ユーザーのカート内の全ての商品を削除
    Cart::where('user_id', $user_id)->delete();

    // 決済完了ページ（thanksビュー）を表示
    return view('thanks')->with('success', '決済が完了し、カートから商品が削除されました。');
    }
}