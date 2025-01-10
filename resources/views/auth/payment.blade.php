@extends('layouts.app')

@section('title', 'Payment')

@section('content')
<div class="container mt-5 d-flex justify-content-center">
    <div class="card shadow-sm" style="width: 50%; border-radius: 10px;">
        <div class="card-header text-white text-center" style="background-color: #4CAF50; border-radius: 10px;">
            <h2>Payment</h2>
        </div>
        <div class="card-body" style="background-color: #f9f9f9;">
            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

            <form method="POST" action="{{ route('payment.process') }}">
                @csrf

                <div class="mb-3">
                    <p class="form-label">Price</p>
                    <p class="form-control bg-light">{{ number_format($price, 0, ',', '.') }} IDR</p>
                </div>

                <div class="mb-3">
                    <label for="payment_amount" class="form-label">Payment Amount</label>
                    <input type="number" class="form-control" id="payment_amount" name="payment_amount" required>
                </div>

                <button type="submit" class="btn w-100" style="background-color: #4CAF50; border-color: #4CAF50; color: white;">
                    Pay
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
