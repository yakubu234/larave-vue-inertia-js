<?php

namespace App\Http\Controllers;

use App\Actions\RegisterAction;
use App\Http\Requests\RegisterRequest;
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
