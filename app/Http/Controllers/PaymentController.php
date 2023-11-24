<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;


class PaymentController extends Controller
{
    public function createIntent(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $paymentIntent = PaymentIntent::create([
            'amount' => $request->amount, // 金額は最小通貨単位で指定する（例：1000 = $10.00）
            'currency' => 'jpy', // 通貨を指定
            // Verify your integration in this guide by including this parameter
            'metadata' => ['integration_check' => 'accept_a_payment'],
        ]);

        $output = [
            'clientSecret' => $paymentIntent->client_secret,
        ];

        return response()->json($output);
    }
}