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

use think\Loader;

Loader::addNamespace('src', Loader::getRootPath() . 'src' . DIRECTORY_SEPARATOR);

class TestCase extends \think\testing\TestCase
{
    //php think unit ./tests/liuTest.php beta 单个文件执行  一个测试类只会执行第一个方法
    protected $baseUrl = 'http://127.0.0.1:8000';
}