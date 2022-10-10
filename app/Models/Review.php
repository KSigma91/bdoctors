<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'review', 'vote', 'date','name', 'user_id'
    ];
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
