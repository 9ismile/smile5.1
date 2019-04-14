<?php
namespace app\index\controller;

use app\common\controller\Base;
use src\common\service\BaseService;
use src\user\service\test;
use think\App;

class Index extends Base
{
    public function __construct(App $app = null)
    {
        parent::__construct($app);
    }

    public function index(test $test)
    {
        $test->index();
    }

    public function hello($name = 'ThinkPHP5')
    {

    }
}
