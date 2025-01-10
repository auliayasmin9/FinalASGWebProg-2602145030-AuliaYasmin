<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>ConnectFriend - Casual Friends</title>
    <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css\">
</head>
<body>
    <div class=\"container mt-5\">
        <h1 class=\"text-center\">Welcome to ConnectFriend - Casual Friends</h1>
        <p class=\"text-center\">Find friends with the same interests and hobbies!</p>

        <div class=\"text-center my-4\">
            <a href=\"{{ route('login') }}\" class=\"btn btn-primary\">Login</a>
            <a href=\"{{ route('register') }}\" class=\"btn btn-success\">Register</a>
        </div>

        <div class=\"row\">
            @foreach ($users as $user)
                <div class=\"col-md-4 mb-4\">
                    <div class=\"card\">
                        <img src=\"{{ asset('images/' . $user['image']) }}\" class=\"card-img-top\" alt=\"{{ $user['name'] }}\">
                        <div class=\"card-body text-center\">
                            <h5 class=\"card-title\">{{ $user['name'] }}</h5>
                            <p class=\"card-text\">Hobby: {{ $user['hobby'] }}</p>
                            <a href=\"#\" class=\"btn btn-outline-primary\">View Profile</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js\"></script>
</body>
</html>

<!-- @extends('layouts.app')

@section('content')
<h1>Welcome to Casual Friends</h1>

    <form method="GET" action="{{ route('home.filter.gender') }}">
        <select name="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        <button type="submit">Filter by Gender</button>
    </form>

    <form method="GET" action="{{ route('home.filter.hobby') }}">
        <input type="text" name="hobby" placeholder="Enter hobby">
        <button type="submit">Filter by Hobby</button>
    </form>

    <div class="users">
        @foreach ($users as $user)
            <div class="user">
                <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
                <p>{{ $user->name }}</p>
                <p>{{ $user->gender }}</p>
                <p>Hobbies: {{ implode(', ', $user->hobbies->pluck('name')->toArray()) }}</p>
            </div>
        @endforeach
    </div>
@endsection -->
