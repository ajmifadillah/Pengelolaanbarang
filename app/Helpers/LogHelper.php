<?php

namespace App\Helpers;

use App\Models\LogActivity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class LogHelper
{
    /**
     * Catat aktivitas ke database.
     */
    public static function record($subject, $userId = null): void
    {
        LogActivity::create([
            'user_id' => $userId ?? (Auth::check() ? Auth::id() : null),
            'subject' => $subject,
            'url' => Request::fullUrl(),
            'method' => Request::method(),
            'ip_address' => Request::ip(),
            'agent' => Request::header('user-agent'),
        ]);
    }
}
