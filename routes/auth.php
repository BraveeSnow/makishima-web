<?php

use App\Models\DiscordUser;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('/auth/redirect', function () {
    return Socialite::driver('discord')->redirect();
});

Route::get('/auth/callback', function () {
    $user = Socialite::driver('discord')->user();
    print_r($user->token);
    DiscordUser::updateOrCreate(
        ['id' => $user->id],
        [
            'token' => $user->token,
            'refresh_token' => $user->refreshToken,
            'expires_in' => time() + (int)$user->expiresIn,
        ],
    );

    return redirect("/");
});
