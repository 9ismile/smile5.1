<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/14
 * Time: 18:51
 */
namespace app\common\controller;

use src\user\service\test;
use think\Facade;

class Authority
{

    private $key = '';
    private $authority = true;
    private $user_service = null;

    public function __construct(test $test){
        $this->user_service = $test;
        $this->key = '3ddaeb82fbba964fb3461d4e4f1342eb'; //smile
    }

    public function run($authority = true, $request = null)
    {
        dump($request);
    }

    public function setKey($key = '')
    {
        if(empty($key)) return outMessageArray(-100);
        $this->key = $key;
    }

    public function createToken()
    {

    }
}