<?php

namespace App\Http\Controllers\Api;

use Braintree\Gateway;
use App\Models\Sponsorship;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest;
use App\Models\User;

class SponsorshipController extends Controller
{
    public function generate(Request $request, Gateway $gateway)
    {
        $token = $gateway->clientToken()->generate();

        return response()->json([
            'success'   => true,
            'token' => $token
        ]);
    }

    public function makePayment(OrderRequest $request, Gateway $gateway)
    {
        $sponsorship = Sponsorship::find($request->sponsorship);

        $result = $gateway->transaction()->sale([
            'amount' => $sponsorship->price,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            $user = User::find($request->user);
            $date = date('Y-m-d H:i:s');
            $date_add = date("Y-m-d H:i:s", strtotime('+' . $sponsorship->time . 'hours'));
            $attach_data[1] = [
                'sponsorship_id' => $sponsorship->id,
                'starting_date' => $date,
                'ending_date' => $date_add,
                'id_paymant' => 1
            ];
            $user->sponsorships()->attach($attach_data);
            return response()->json([
                'success' => true,
                'message' => "Transazione eseguita con Successo!"
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Transazione Fallita!!"
            ]);
        }
    }
}
