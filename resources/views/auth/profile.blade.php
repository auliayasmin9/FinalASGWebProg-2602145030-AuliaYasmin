// resources/views/user_profile.blade.php
@foreach ($users as $user)
    <div class="user">
        <img src="{{ $user->profile_picture }}" alt="{{ $user->name }}">
        @if (auth()->user()->friends->contains($user))
            <form action="{{ route('friend.remove', $user->id) }}" method="POST">
                @csrf
                <button type="submit">Remove Friend</button>
            </form>
        @else
            <form action="{{ route('friend.add', $user->id) }}" method="POST">
                @csrf
                <button type="submit">Like</button>
            </form>
        @endif
    </div>
@endforeach

@foreach (auth()->user()->notifications as $notification)
    <div class="notification">
        {{ $notification->message }}
    </div>
@endforeach
