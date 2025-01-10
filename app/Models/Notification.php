@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Notifikasi</h1>

        @if ($notifications->isEmpty())
            <p>Tidak ada notifikasi baru.</p>
        @else
            <ul class="list-group">
                @foreach ($notifications as $notification)
                    <li class="list-group-item">
                        <div>
                            <p><strong>{{ $notification->data['title'] }}</strong></p>
                            <p>{{ $notification->data['message'] }}</p>

                            <!-- Tombol untuk menandai notifikasi sebagai sudah dibaca -->
                            <form action="{{ route('notifications.markAsRead', $notification->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-primary">Tandai sebagai dibaca</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
