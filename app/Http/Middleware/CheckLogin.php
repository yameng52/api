<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Request;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $token = null;
        $_SERVER['token'] = $token;
        if(isset($_COOKIE['token']))
        {
            $token = $_COOKIE['token'];
            $_SERVER['token'] = $token;
        }

        //查询 passport token是否有效
        if($token)
        {
            $url = env("PASSPORT_HOST") . '/web/check/token?token='.$token;
            $res = file_get_contents($url);
            $data = json_decode($res,true);

            if($data['errno']==0)       //token有效
            {
                $_SERVER['uid'] = $data['data']['u']['uid'];
                $_SERVER['user_name'] = $data['data']['u']['user_name'];
                $_SERVER['token'] = $token;
            }

        }

        return $next($request);
    }