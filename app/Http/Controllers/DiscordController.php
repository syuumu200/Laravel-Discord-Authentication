<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use \GuzzleHttp;
use Auth;
use Inertia\Inertia;
use App\Models\User;

class DiscordController extends Controller
{
    protected $tokenURL = "https://discord.com/api/oauth2/token";
    protected $apiURLBase = "https://discord.com/api/users/@me";
    protected $tokenData = [
        "client_id" => NULL,
        "client_secret" => NULL,
        "grant_type" => "authorization_code",
        "code" => NULL,
        "redirect_uri" => NULL,
        "scope" => "identify&email"
    ];

    public function login(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route("index");
        };
        if ($request->missing("code") && $request->missing("access_token")) {
            $url = DiscordOauth2LoginUrl::generate(
                config('discord.client_id'),
                config('discord.redirect_uri'),
                $request->session()->get('state')
            );
            return $request->hasHeader('X-Inertia') ? Inertia::location($url) : redirect()->away($url);
        };

        $this->tokenData["client_id"] = config("discord.client_id");
        $this->tokenData["client_secret"] = config("discord.client_secret");
        $this->tokenData["code"] = $request->get("code");
        $this->tokenData["redirect_uri"] = config("discord.redirect_uri");

        $client = new GuzzleHttp\Client();

        try {
            $accessTokenData = $client->post($this->tokenURL, ["form_params" => $this->tokenData]);
            $accessTokenData = json_decode($accessTokenData->getBody());
        } catch (\GuzzleHttp\Exception\ClientException $error) {
            return redirect()->route("index");
        };

        $userData = Http::withToken($accessTokenData->access_token)->get($this->apiURLBase);
        if ($userData->clientError() || $userData->serverError()) {
            return redirect()->route("index");
        };

        $userData = json_decode($userData);

        $user = User::updateOrCreate(
            [
                'id' => $userData->id,
            ],
            [
                'username' => $userData->username,
                'discriminator' => $userData->discriminator,
                'avatar' => $userData->avatar,
                'verified' => $userData->verified,
                'locale' => $userData->locale,
                'mfa_enabled' => $userData->mfa_enabled,
                'refresh_token' => $accessTokenData->refresh_token
            ]
        );

        Auth::login($user);

        return redirect()->route("index");
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        return redirect()->route("index");
    }
}
