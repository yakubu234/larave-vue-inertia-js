<?php

namespace App\Traits;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Throwable;

trait LogTrait
{
    public function log($data)
    {
        try {
            Log::info(array($data));
        } catch (Throwable $e) {
            report($e);
            $unitPath = storage_path("logs/lumen-" . Carbon::now()->format('Y-m-d') . ".log");
            shell_exec('sudo chmod 0775 ' . $unitPath);
            shell_exec('sudo chown www-data:www-data ' . $unitPath);
            Log::info(array($data));
        }
    }
}
