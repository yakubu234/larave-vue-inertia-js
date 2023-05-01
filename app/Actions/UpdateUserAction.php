<?php

namespace App\Actions;

use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\ApiResponseTrait;
use App\Traits\EncryptionTrait;
use App\Traits\LogTrait;
use Illuminate\Support\Facades\Auth;

class UpdateUserAction
{
    use ApiResponseTrait, LogTrait, EncryptionTrait;

    public function update($data)
    {
        unset($data['confirm_password']);

        $userID = Auth::user()->id;
        try {
            $user  = User::find($userID);
            $user->update($data);

            if ($user) {
                return $this->success([
                    'user_details' => new UserResource($user)
                ], 'record updated successfully', 200);
            }

            return $this->error('Invalid Password', 400, null);
        } catch (\Throwable $th) {
            $this->log(sprintf('[%s],[%d] ERROR:[%s]', __METHOD__, __LINE__, json_encode($th->getMessage(), true)));
            return $this->error('An error occured when updating', 400, null);
        }
    }
}
