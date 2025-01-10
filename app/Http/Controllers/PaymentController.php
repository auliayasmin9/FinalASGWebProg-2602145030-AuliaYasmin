<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function show()
    {
        $registration_price = session('registration_price');
        return view('payment', compact('registration_price'));
    }

    public function process(Request $request)
    {
        $registration_price = session('registration_price');
        $paid_amount = $request->input('amount');

        if ($paid_amount < $registration_price) {
            $difference = $registration_price - $paid_amount;
            return back()->withErrors("You are still underpaid $difference.");
        } elseif ($paid_amount > $registration_price) {
            $difference = $paid_amount - $registration_price;
            session(['overpaid_amount' => $difference]);
            return view('payment_overpaid', compact('difference'));
        } else {
            return redirect()->route('home')->with('success', 'Payment successful!');
        }
    }

    public function storeBalance(Request $request)
    {
        // Simpan sisa saldo ke wallet pengguna
        return redirect()->route('home')->with('success', 'Balance has been added.');
    }
}
