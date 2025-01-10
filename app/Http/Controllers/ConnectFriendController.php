<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Hobby;
use App\Models\Payment;
use App\Models\Chat;

class ConnectFriendController extends Controller
{
    public function index()
    {
        $users = User::with('hobbies')->get();
        return view('home', compact('users'));
    }

    public function showRegistrationForm()
    {
        $hobbies = Hobby::all();
        return view('auth.register', compact('hobbies'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'gender' => 'required|in:male,female',
            'hobbies' => 'required|array|min:3',
            'instagram' => 'required|url|regex:/^http:\/\/www\.instagram\.com\/.+/',
            'mobile' => 'required|digits_between:10,15',
            'age' => 'required|integer|min:18',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'gender' => $request->gender,
        ]);

        $user->hobbies()->attach($request->hobbies);

        $price = rand(100000, 125000);
        Payment::create([
            'user_id' => $user->id,
            'price' => $price,
            'amount_paid' => 0,
        ]);

        return redirect()->route('payment', $user->id);
    }

    public function showPayment($id)
    {
        $payment = Payment::where('user_id', $id)->first();
        return view('payment', compact('payment'));
    }

    public function makePayment(Request $request, $id)
    {
        $payment = Payment::where('user_id', $id)->first();
        $request->validate(['amount_paid' => 'required|integer|min:1']);

        $payment->amount_paid += $request->amount_paid;
        $payment->save();

        if ($payment->amount_paid < $payment->price) {
            $underpaid = $payment->price - $payment->amount_paid;
            return back()->with('error', "You are still underpaid Rp$underpaid.");
        } elseif ($payment->amount_paid > $payment->price) {
            $overpaid = $payment->amount_paid - $payment->price;
            return back()->with('overpaid', "Sorry you overpaid Rp$overpaid. Would you like to enter it into a balance?");
        }

        return redirect()->route('home')->with('success', 'Payment completed successfully.');
    }
}

?>
