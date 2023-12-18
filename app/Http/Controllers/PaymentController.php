<?php

namespace App\Http\Controllers;

use App\Http\Helpers\ZarinpalPayment;
use App\Models\Payment;
use Evryn\LaravelToman\CallbackRequest;
use Evryn\LaravelToman\Facades\Toman;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function pay(Request $request) {
        // Todo add the pay logic


        $request->validate([
            'amount' => 'numeric',
            'description' => 'string|required',
        ]);

        $user = $request->user();
        $pay_request = Toman::amount($request->amount)
             ->description($request->description)
             ->callback(route('payment.verify'))
//             ->mobile('09350000000')
             ->email($user->email)
            ->request();

        if ($pay_request->successful()) {
            $transaction_id = $pay_request->transactionId();
            $payment = new Payment();

            $payment->type = 1;
            $payment->user_id = $user->id;
            $payment->status = 0;
            $payment->amount = $request->amount;
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


    public function verify(CallbackRequest $request) {

        $pending_payment = Payment::query()->where('transaction_id', '=', $request->transactionId())->first();
        if (!$pending_payment) {
            return response()->json([
                'message' => 'there was no transaction with this transaction id',
            ], 404);
        }

        $payment = $request->amount($pending_payment->amount)->verify();

        if ($payment->successful()) {
            // Store the successful transaction details
            $referenceId = $payment->referenceId();

            $pending_payment->status = 1;
            $pending_payment->reference_id = $referenceId;

            // saving the pending payment
            $pending_payment->save();

            return response()->json([
                'message' => 'It was successful',
            ], 200);
        }

        if ($payment->alreadyVerified()) {
            return response()->json([
                'message' => 'Already verified',
            ], 200);
        }

        if ($payment->failed()) {
            $pending_payment->status = -1;

            $pending_payment->save();
            return response()->json([
                'message' => 'There was a problem',
                'error' => $payment->messages(),
            ], 300);
        }
    }
}
