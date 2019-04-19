<?php
namespace app\index\controller;

use app\common\controller\BaseController;
use src\common\service\BaseService;
use src\user\run\LoginRun;
use src\user\service\login\LoginService;
use think\App;

class Index extends BaseController
{
    public $is_auth = false;
    private $login_service;

    public function __construct(App $app = null, LoginService $login_service)
    {
        parent::__construct($app);
        $this->login_service = $login_service;
    }

    public function index()
    {
        $this->login_service->initLogin();
    }

    public function hello($name = 'ThinkPHP5')
    {

    }
}
