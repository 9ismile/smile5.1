<?php
namespace app\common\controller;

use app\facade\AuthorityFacade;
use src\user\service\test;
use think\App;
use think\Container;
use think\Controller;
use think\Loader;

Loader::addNamespace('src', Loader::getRootPath() . 'src' . DIRECTORY_SEPARATOR);

class BaseController extends Controller
{
    protected $uid = ''; // 用户uid
    protected $shop_id = ''; // 用户操作组
    protected $platform_id = ''; // 用户店铺id
    protected $is_auth = true; // 是否需要授权登录

    public function __construct(App $app = null)
    {
        parent::__construct($app);
        $this->initBase();
    }

    private function initBase()
    {
        // 绑定类到容器
        $this->initContainer();
        AuthorityFacade::run($this->is_auth, $this->request);
//        echo outMessageJson(200);
//        exit();
    }


    /**
     * 初始化第三方容器类
     */
    public function initContainer()
    {
        $this->bindClassToContainer();
        $this->initContainerClass();
    }

    public function bindClassToContainer()
    {
//        Container::set('Authority','app\common\controller\Authority');
    }

    public function initContainerClass()
    {
//        Container::get('Authority');
    }


}
