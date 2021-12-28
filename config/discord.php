<?php


return [
  'client_id' => env('DISCORD_CLIENT_ID'),
  'client_secret' => env('DISCORD_CLIENT_SECRET'),
  'redirect_uri' => env('DISCORD_REDIRECT_URI'),
  'login_url' => 'https://discord.com/oauth2/authorize?' . http_build_query([
    'client_id' => (int) env('DISCORD_CLIENT_ID'),
    'redirect_uri' => env('DISCORD_REDIRECT_URI'),
    'response_type' => 'code',
    'scope' => 'email identify'
  ])
];
