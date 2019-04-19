<?php
/**
 * Created by PhpStorm.
 * User: 9Smile
 * Date: 2019/4/12
 * Time: 16:33
 */

namespace src\common\service;


use app\facade\AuthorityFacade;
use src\common\repository\BaseRepository;
use think\App;
use think\Container;
use think\Request;

class BaseService
{
    protected $app = null;
    protected $request = null;
    protected $uid = 0; // 用户uid
    protected $shopId = 0; // 用户店铺id
    protected $platformId = 0; // 用户平台id

    public function __construct(App $app = null)
    {
        $this->app = $app ?: Container::get('app');
        $this->request = $this->app['request'];
        $this->init();
    }

    private function init()
    {

    }

    private function isAuthorize()
    {

    }
}