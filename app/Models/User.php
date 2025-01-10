<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'hobbies',
        'instagram',
        'mobile',
        'age',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'hobbies' => 'array',
    ];

    public function friends()
    {
        return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_id')->withPivot('status');
    }

    public function addFriend(User $friend)
    {
        $this->friends()->attach($friend->id, ['status' => 0]);
    }

    public function removeFriend(User $friend)
    {
        $this->friends()->detach($friend->id);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function receivedMessages()
    {
        return $this->hasMany(Message::class, 'receiver_id');
    }
}
