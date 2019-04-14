<?php
namespace app\common\controller;

use think\App;
use think\Container;
use think\Controller;
use think\Facade;
use Zewail\Api\Api;

class Base extends Controller
{
    protected $uid = ''; // 用户uid
    protected $group_id = ''; // 用户操作组
    protected $repository = []; // 模型仓库
    protected $is_authorize = true; // 是否需要授权登录
    protected $operation = false;

    public function __construct(App $app = null)
    {
        parent::__construct($app);
        $this->init();
    }

    private function init()
    {
        // 绑定类到容器
        $this->initContainer();

        $this->validateAuthority();
//        $this->validateToken();
//        $this->response->array([]);
        echo outMessageJson(200);
        exit();
    }

    public function initContainer()
    {
        $this->bindClassToContainer();
        $this->initContainerClass();
    }

    public function bindClassToContainer()
    {
        Container::set('Authority','app\common\controller\Authority');
    }

    public function initContainerClass()
    {
        Container::get('Authority');
    }

    public function validateAuthority()
    {
        $authority_class = Container::get('Authority');
        $authority_class->run($this->is_authorize,$this->request);
    }

}
