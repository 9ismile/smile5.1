<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/14
 * Time: 18:51
 */
namespace app\common\controller;

use think\Facade;

class Authority
{

    private $key = '';
    private $is_auth = true;
    private $user_service = null;
    private $token = '';


    public function __construct(){
//        $this->user_service = $test;
        $this->key = '3ddaeb82fbba964fb3461d4e4f1342eb'; //smile
    }

    /**
     * 授权运行入口
     * @param bool $is_auth
     * @param null $request
     * @return mixed
     */
    public function run($is_auth = true, $request = null)
    {
        if(!$is_auth) return outMessageArray(100,'auth');
        $this->validateToken();
    }

    /**
     * 设置授权key
     * @param string $key
     * @return mixed
     */
    public function setKey($key = '')
    {
        if(empty($key)) return outMessageArray(-100,'auth');
        $this->key = $key;
    }

    /**
     * 获取授权key
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }


    public function createToken(){}

    private function validateToken()
    {

    }
}