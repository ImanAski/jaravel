<?php

namespace App\Http\Controllers;

use App\Http\Helpers\PayHelper;
use App\Models\Payment;
use Evryn\LaravelToman\CallbackRequest;
use Evryn\LaravelToman\Facades\Toman;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    // For future programmer reading this note. currently I hate my life. I miss my girl. I wish I was dead. please don't swear to me when reading my fucked up code. thanks man.
    public function pay(Request $request) {
        // Todo add the pay logic

        $request->validate([
            'amount' => 'numeric|required',
            'description' => 'string|required',
        ]);

        $pay_helper = new PayHelper($request->user(), $request->amount, $request->description);

        return $pay_helper->pay();
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
