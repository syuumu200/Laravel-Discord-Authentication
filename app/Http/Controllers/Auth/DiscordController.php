<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DiscordController extends Controller
{
    public function login(Request $request)
    {
        if ($request->missing("code")) {
            $url = Socialite::driver("discord")
                ->setScopes(['identify'])
                ->redirect()
                ->getTargetUrl();
            return $request->hasHeader('X-Inertia') ?
                Inertia::location($url) :
                redirect()->away($url);
        }

        $user = Socialite::driver("discord")->user();

        $user = User::updateOrCreate(
            [
                'id' => (int) $user->id,
            ],
            [
                'username' => $user->name,
                'discriminator' => $user->user['discriminator'],
                'avatar' => $user->avatar,
                'verified' => $user->user['verified'],
                'locale' => $user->user['locale'],
                'mfa_enabled' => $user->user['mfa_enabled'],
                'refresh_token' => $user->refreshToken
            ]
        );

        Auth::login($user);
        return redirect($request->session()->pull('before_auth_url', '/'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        return redirect()->route("index");
    }
}
