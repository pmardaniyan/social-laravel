<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterNewUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function register(RegisterNewUserRequest $request)
    {
        $field = $request->has('email') ? 'email' : 'mobile';
        $value = $request->input($field);

        //TODO: generate random code for send message
        $code = '123456';
        //TODO: Must Saving confog value Cache 
        Cache::put('user-auth-register-' . $value, $field, now()->addDays(5));



        //TODO:Send EmailService && SmsService
        Log::info('SEND-REGISTER-CODE-MESSEGE-TO-USER', ['code' => $code]);
        return response(['message' => 'کاربر ثبت موقت شده'], 200);
    }
}