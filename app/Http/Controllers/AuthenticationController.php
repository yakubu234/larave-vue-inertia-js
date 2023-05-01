<?php

namespace App\Http\Controllers;

use App\Actions\LoginAction;
use App\Actions\RegisterAction;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Traits\ApiResponseTrait;
use Inertia\Inertia;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    use ApiResponseTrait;

    public function register(RegisterRequest $request)
    {
        $data = (new RegisterAction())->register($request->validated());
        $view = $data->getData()->status == 'Success' ? 'show.dashboard' : 'show.register.page';

        return $request->wantsJson() ? $data : redirect()->route($view)->with('data', $data);
    }

    public function login(LoginRequest $request)
    {
        $data = (new LoginAction())->login($request->validated());
        $view = $data->getData()->status == 'Success' ? 'show.dashboard' : 'show.login.page';

        return $request->wantsJson() ? $data : redirect()->route($view)->with('data', $data);
    }

    public function showDashboard()
    {
        return Inertia::render('Dashboard');
    }

    public function showLoginPage()
    {
        return Inertia('Login');
    }

    public function showRegisterPage()
    {
        return Inertia('Register');
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        $data = $this->success(null, 'logout successful');
        return $request->wantsJson() ? $data : Inertia::render('Login', ['data' => $data]);
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
