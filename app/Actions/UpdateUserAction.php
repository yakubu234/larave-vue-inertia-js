<?php

namespace App\Actions;

use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\ApiResponseTrait;
use App\Traits\EncryptionTrait;
use App\Traits\LogTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdateUserAction
{
    use ApiResponseTrait, LogTrait, EncryptionTrait;

    public function update($data)
    {

        $userID = Auth::user()->id;

        try {
            $user = User::find($userID);

            if (!Hash::check($data['password'], $user->password)) {
                return $this->error('Invalid Password', 401, null);
            }

            unset($data['password']);
            $user->update($data);
            return $this->success([
                'user_details' => new UserResource($user)
            ], 'record updated successfully', 200);
        } catch (\Throwable $th) {
            $this->log(sprintf('[%s],[%d] ERROR:[%s]', __METHOD__, __LINE__, json_encode($th->getMessage(), true)));
            return $this->error('An error occured when updating', 400, null);
        }
    }

    public function updatePassword($data)
    {
        $userID = Auth::user()->id;

        try {
            $user = User::find($userID);

            unset($data['confirm_password']);
            $user->update($data);
            return $this->success([
                'user_details' => new UserResource($user)
            ], 'password updated successfully', 200);
        } catch (\Throwable $th) {
            $this->log(sprintf('[%s],[%d] ERROR:[%s]', __METHOD__, __LINE__, json_encode($th->getMessage(), true)));
            return $this->error('An error occured when updating', 400, null);
        }
    }
}
