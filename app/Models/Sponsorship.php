<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    protected $fillable = ['price', 'time'];

    public function users()
    {
        return $this->belongsToMany('App\Models\User')->withPivot('user_id', 'starting_date', 'ending_date', 'id_paymant');
    }
}
