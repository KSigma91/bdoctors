<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['user_id', 'message', 'date', 'email', 'sender_receiver'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
