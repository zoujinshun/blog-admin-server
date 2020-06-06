<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Models\AdminUser;
use App\Http\Services\Jwt;
use Illuminate\Http\Request;

/**
 * 登录认证模块
 */
class AuthController extends Controller
{
    public function userLogin(Request $request)
    {
        $account = $request->input('account');
        $password = $request->input('password');
        $user = AdminUser::where('account', $account)->where('password', $password)->first();
        if (!$user) {
            return response('用户认证失败', 401);
        }
        list($token, $refreshToken) = Jwt::getToken();
        return response()->json([
            'userinfo' => $user,
            'jwt_token' => $token,
            'refresh_token' => $refreshToken 
        ]);
    }
}
