<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2015 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: yunwuxin <448901948@qq.com>
// +----------------------------------------------------------------------
namespace tests;

use app\index\controller\Index;
use src\user\model\SysUserModel;
use src\user\repository\LoginRepository;
use src\user\service\login\LoginService;
use think\App;

class LiuTest extends TestCase
{

    public function test()
    {
        dump(outMessageArray(200,'c'));
        $app = new App();
        $model = new SysUserModel();
        $repository = new LoginRepository($model);
        $loginService = new LoginService($repository);
        $index = new Index($app, $loginService);
        dump($index->index());
//        $this->visit('/')->see('ThinkPHP');
    }

    /**
     * @depends test
     */
    public function beta()
    {
        echo '12313';
    }
}