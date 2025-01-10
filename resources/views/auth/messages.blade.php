<form action="{{ route('message.send', $receiver->id) }}" method="POST">
    @csrf
    <textarea name="message" placeholder="Type a message..."></textarea>
    <button type="submit">Send</button>
</form>

@foreach ($messages as $message)
    <div class="{{ $message->sender_id == auth()->id() ? 'sent' : 'received' }}">
        {{ $message->message }}
    </div>
@endforeach
