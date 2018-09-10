<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmsController extends Controller
{
    //
    public function smsRegister($mobile,SmsSender $smsSender)
    {
//        if (!preg_match("/^1[345678]{1}\d{9}$/", $mobile)) {//检测 手机格式
//            $message[] = '手机号格式错误';
//            return response()->json(['result' => false, 'message' => $message]);
//        }
//        if ($this->isMobileExist($mobile)) {//检测手机是否存在等
//            $message[] = '手机号已注册';
//            return response()->json(['result' => false, 'message' => $message]);
//        }
        if($smsSender->sendSmsCode($mobile, 'register')){
            return response()->json(['success'=>true,'message'=>['发送验证码成功']]);
        }else{
            return response()->json(['success'=>false,'message'=>$smsSender->getMessage()]);
        }
    }

    public function isMobileExist($mobile)
    {
        $user = User::where('mobile', $mobile)->first();
        if ($user) {
            return true;
        } else {
            return false;
        }
    }
}
