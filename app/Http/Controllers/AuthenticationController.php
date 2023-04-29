<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function register(RegisterRequest $request)
    {
        return (new RegisterAction())->register($request->validated());
    }

    public function login()
    {
        return Inertia('login', [
            'page' => 'pages'
        ]);
    }

    public function logout()
    {
    }

    public function deleteAccount()
    {
    }

    public function updateDetails()
    {
    }

    public function newToken()
    {
    }
}
