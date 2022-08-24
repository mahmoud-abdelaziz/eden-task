<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(LoginRequest $request) {
        $response = \Illuminate\Support\Facades\Http::asForm()->post(config('oauth.authorize_url'), [
            'grant_type' => 'password',
            'client_id' => config('oauth.client_id'),
            'client_secret' => config('oauth.secret'),
            'username' => $request->get("email"),
            'password' => $request->get("password"),
            'scope' => '',
        ]);
        return $response->json();
    }
}
