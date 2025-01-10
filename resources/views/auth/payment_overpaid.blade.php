<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overpayment - ConnectFriend</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Payment Overpaid</h2>

        <div class="alert alert-warning">
            Sorry, you overpaid <strong>{{ number_format($overpaidAmount, 0, ',', '.') }} IDR</strong>.
            Would you like to store the rest in your wallet balance?
        </div>

        <form method="POST" action="{{ route('payment.store_balance') }}">
            @csrf
            <input type="hidden" name="overpaid_amount" value="{{ $overpaidAmount }}">

            <div class="mb-3">
                <label for="store_balance" class="form-label">Would you like to store the excess in your wallet?</label>
                <select class="form-select" id="store_balance" name="store_balance" required>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>
