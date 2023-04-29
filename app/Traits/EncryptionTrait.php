<?php

namespace App\Traits;

use Illuminate\Contracts\Encryption\DecryptException;

trait EncryptionTrait
{
    use LogTrait;

    public function encryption(String $string)
    {
        $encrypter = app('Illuminate\Contracts\Encryption\Encrypter');

        try {

            $encryption = $encrypter->encrypt($string);
            return base64_encode($encryption);
        } catch (DecryptException $e) {
            $this->log(sprintf('[%s],[%d] ERROR:[%s]', __METHOD__, __LINE__, json_encode($e->getMessage(), true)));
            return false;
        }
    }

    public function decryption(String $string)
    {
        $decrypter = app('Illuminate\Contracts\Encryption\Encrypter');
        $string = base64_decode($string);

        try {

            return $decrypter->decrypt($string);
        } catch (DecryptException $e) {
            $this->log(sprintf('[%s],[%d] ERROR:[%s]', __METHOD__, __LINE__, json_encode($e->getMessage(), true)));
            return false;
        }
    }
}
