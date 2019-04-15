<?php
/**
 * Created by PhpStorm.
 * User: 9Smile
 * Date: 2019/4/15
 * Time: 14:43
 */
namespace src\user\service\login;

use src\common\api\BaseApi;

trait LoginService
{
    public function __construct()
    {

    }

    public function initLogin()
    {
        dump($this->app);
       echo $this->uid;
    }
}