<?php

namespace App\Http\Helpers;

use App\Models\Payment;
use Evryn\LaravelToman\Facades\Toman;

class PaymentHelper
{
    //Kids if you don't know, smoking is bad for your health.
    // Don't be like me, don't smoke.
    private $user;
    private $amount;
    private $description;

    public function __construct($user, $amount, $description) {

        $this->user = $user;
        $this->amount = $amount;
        $this->description = $description;
    }

    public function pay() {
        $pay_request = Toman::amount($this->amount)
            ->description($this->description)
            ->email($this->user->email)
            ->request();

        if ($pay_request->successful()) {
            $transaction_id = $pay_request->transactionId();
            $payment = new Payment();

            $payment->type = 1;
            $payment->user_id = $this->user->id;
            $payment->status = 0;
            $payment->amount = $this->amount;
            $payment->transaction_id = $transaction_id;

            $payment->save();
            // Store created transaction details for verification

            return $pay_request->pay()->GetTargetUrl(); // Redirect to payment URL
        }

        if ($pay_request->failed()) {
            // Handle transaction request failure; Probably showing proper error to user.
            return response()->json([
                'message' => $pay_request->messages(),
            ], 403);
        }
    }

    public function verify() {
        
    }
}
