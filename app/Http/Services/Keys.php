<?php
namespace App\Http\Services;

class Keys
{
    /**
     * refreshToken Key
     */
    public static function refreshToken($refreshToken = '')
    {
        if (!$refreshToken) {
            return false;
        }
        return 'T_REFRESH|' . $refreshToken;
    }
}
