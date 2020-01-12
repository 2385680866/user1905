<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CommonModel;

class UserController extends Controller
{
	/**
	 * 用户注册页面
	 * @return [type] [description]
	 */
    public function reg1()
    {
    	return view("admin.reg");
    }
    /**
	 * 用户注册
	 * @return [type] [description]
	 */
    public function reg2(Request $request)
    {
    	$data=[
    		"name"=>"zhangsan",
    		"email"=>"zhangsan@qq.com",
    		"pwd1"=>"zhangsan",
    		"pwd2"=>"zhangsan",
    		"mobile"=>"12345678901",
    	];
        //判断名称，邮箱，手机号和密码是否为空
        if(empty($data['name'])||empty($data['email'])||empty($data['pwd1'])||empty($data['mobile'])||empty($data['pwd2']))
        {
            exit("名称,邮箱,手机号和密码必填");
        }
        //判断密码与确认密码是否一致
        if($data['pwd1']!=$data['pwd2'])
        {
            exit("密码与确认密码不一致");
        }
    	$url="http://1905passport.com/api/reg";
    	$response=CommonModel::curlPost($url,$data);
        dd($response);
    }
    /**
	 * 用户登录
	 * @return [type] [description]
	 */
    public function login()
    {
    	$data=[
    		'name'=>"zhangsan",
    		"pwd"=>"zhangsan"
    	];
    	$url="http://1905passport.com/api/login";
    	if(empty($data['name'])){
    		exit("账号不能为空");
    	}
    	if(empty($data['pwd'])){
    		exit("密码不能为空");
    	}
    	$response=CommonModel::curlPost($url,$data);
        dd($response);
    }
    /**
	 * 用户列表
	 * @return [type] [description]
	 */
    public function list()
    {
    	$url="http://1905passport.com/api/list";
        $token ="bd3aeb2ff2f42f66fe0b";
        $uid="8";
        $header=[
            "token:".$token,
            "uid:".$uid
        ];
        $response=CommonModel::curlGet($url,$header);
        dd($response);
    }
}