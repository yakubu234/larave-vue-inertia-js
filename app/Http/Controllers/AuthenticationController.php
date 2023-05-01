<?php

namespace App\Http\Controllers;

use App\Actions\LoginAction;
use App\Actions\RegisterAction;
use App\Actions\UpdateUserAction;
use App\Http\Requests\DeleteRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\User;
use App\Traits\ApiResponseTrait;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    use ApiResponseTrait;

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

    public function updateDetails(UpdateRequest $request)
    {
        $data = (new UpdateUserAction())->update($request->validated());

        return $request->wantsJson() ? $data : redirect()->route('/show.dashboard')->with('data', $data);
    }

    public function deleteAccount(Request $request)
    {
        User::where('id', Auth::user()->id)->delete();
        $data = $this->success(null, 'Account deleted successfully');
        return $request->wantsJson() ? $data : Inertia::render('Login', ['data' => $data]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        $data = $this->success(null, 'logout successful');
        return $request->wantsJson() ? $data : Inertia::render('Login', ['data' => $data]);
    }

    public function newToken()
    {
    }
}
