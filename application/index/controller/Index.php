<?php
namespace app\index\controller;

use src\common\service\BaseService;
use src\user\service\test;

class Index
{
    public function index(test $test)
    {
        $test->index();
    }

    public function hello($name = 'ThinkPHP5')
    {

    }
}
