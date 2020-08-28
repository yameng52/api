<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    } 

    /**
     * 获取商品接口
     */
    public function home()
    {
        $url = 'http://local.1910.com/api/goods/index';
        $data = file_get_contents($url);        //获取商品数据
        $list = json_decode($data,true);

        $response = [
            'errno' => 0,
            'msg'   => 'ok',
            'data'  => [
                'goods' => $list['data']['list']
            ]
        ];
        // echo "<pre>";print_r($response['data']['goods']);echo "<pre>";die;
        return $response;
    }
    //分类接口
    public function ation(){
        $url='http://local.1910.com/api/goods/ation';
        $data = file_get_contents($url);        //获取商品数据
        $list = json_decode($data,true);

        $response = [
            'errno' => 0,
            'msg'   => 'ok',
            'data'  => [
                'goods' => $list['data']['list']
            ]
        ];
        // echo "<pre>";print_r($response['data']['goods']);echo "<pre>";die;
        return $response;
    }
        
    

}