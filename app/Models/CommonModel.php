<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommonModel extends Model
{
	/**
	 * POST
	 * @param  [type] $url  [description]
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
    public static function curlPost($url,$data)
    {
    	//Curl初始化
        $ch=curl_init();
        //Curl 设置
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        //Curl执行
        $response=curl_exec($ch);
        //获取错误信息
        $error=curl_error($ch);
        if($error)
        {
        	die('1');//var_dump($error);die;
        }
        //Curl 关闭(释放)
        curl_close($ch);
        return $response;
    }

    /**
	 * GET
	 * @param  [type] $url  [description]
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
    public static function curlGet($url,$header)
    {
    	//Curl初始化
        $ch=curl_init();
        //Curl 设置
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
        //Curl执行
        $response=curl_exec($ch);
        //获取错误信息
        $error=curl_error($ch);
        if($error)
        {
        	var_dump($error);
        }
        //Curl 关闭(释放)
        curl_close($ch);
        return $response;
    }
}
