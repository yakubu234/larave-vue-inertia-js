<?php

namespace App\Actions;

use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\ApiResponseTrait;
use App\Traits\LogTrait;

class RegisterAction
{

    use LogTrait, ApiResponseTrait;

    protected $user;
    protected $data;

    public function register(array $data)
    {
        try {
            $this->user = User::create($data);

            return $this->success([
                'token' => $this->user->createToken('API Token')->plainTextToken,
                'user_details' => new UserResource($this->user)
            ], 'You have been successfully registered', 201);


            // try {
            //     $this->user = User::create($data);

            //     return [
            //         'token' => $this->user->createToken('API Token')->plainTextToken,
            //         'user_details' => new UserResource($this->user)
            //     ];
            // } catch (\Throwable $th) {
            //     $this->log(sprintf('[%s],[%d] ERROR:[%s]', __METHOD__, __LINE__, json_encode($th->getMessage(), true)));
            //     return ['error' => $th->getMessage()];
            // }
        } catch (\Throwable $th) {
            $this->log(sprintf('[%s],[%d] ERROR:[%s]', __METHOD__, __LINE__, json_encode($th->getMessage(), true)));
        }
    }
}
