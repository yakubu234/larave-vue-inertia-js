<?php

namespace App\Actions;

use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\ApiResponseTrait;
use App\Traits\EncryptionTrait;
use App\Traits\LogTrait;
use Illuminate\Support\Facades\Auth;

class LoginAction
{
    use ApiResponseTrait, LogTrait, EncryptionTrait;

    public function login($request)
    {
        try {
            if (Auth::attempt($request)) {

                $user = Auth::user();

                return $this->success([
                    'token' =>  $user->createToken('API Token')->plainTextToken,
                    'user_details' => new UserResource($user)
                ], 'Action successful', 200);
            }

            return $this->error('Invalid Password', 400, null);
        } catch (\Throwable $th) {
            $this->log(sprintf('[%s],[%d] ERROR:[%s]', __METHOD__, __LINE__, json_encode($th->getMessage(), true)));
            return $this->error('Invalid Password', 400, null);
        }
    }
}
