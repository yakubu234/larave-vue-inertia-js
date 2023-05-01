<?php

namespace App\Http\Controllers;

use App\Actions\LoginAction;
use App\Actions\RegisterAction;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $data = (new RegisterAction())->register($request->validated());

        //this is api
        if (request()->wantsJson()) {
            return $data;
        }


        return Inertia('Register', [
            'data' => $data
        ]);
    }

    public function login(LoginRequest $request)
    {
        $data = (new LoginAction())->login($request->validated());
        $view = $data->getData()->status == 'Success' ? 'Dashboard' : 'Login';


        return $request->wantsJson() ? $data : Inertia($view, ['data' => $data]);
    }

    public function showDashboard()
    {
        return Inertia('Dashboard', [
            'page' => 'pages'
        ]);
    }

    public function showLoginPage()
    {
        return Inertia('Login');
    }

    public function showRegisterPage()
    {
        return Inertia('Register');
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
