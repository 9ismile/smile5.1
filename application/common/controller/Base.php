<?php
namespace app\common\controller;

use think\App;
use think\Controller;
use Zewail\Api\Api;

class Base extends Controller
{
    use Api;

    protected $uid = null;

    public function __construct(App $app = null)
    {
        parent::__construct($app);
        $this->init();
    }

    private function init()
    {
        //绑定容器可以减少实例化
        $this->bindContainer();
        $this->validateToken();
        $this->response->array([]);
    }

    public function bindContainer()
    {
        bind([

        ]);
        return ;
    }

}
