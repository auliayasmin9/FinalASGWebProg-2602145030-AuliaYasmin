<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hobby extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    public function penggunas(){
        return $this->belongsToMany(User::class);
    }
}
