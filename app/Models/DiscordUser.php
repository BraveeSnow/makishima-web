<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiscordUser extends Model
{
    protected $guarded = [];

    protected $hidden = [
        'token',
        'refresh_token',
    ];

    protected function casts()
    {
        return [
            'token' => 'hashed',
            'refresh_token' => 'hashed',
        ];
    }
}
