<?php
namespace app\index\controller;

use app\common\controller\BaseController;
use src\common\service\BaseService;
use src\user\run\LoginRun;
use think\App;

class Index extends BaseController
{
    public $is_auth = false;

    public function __construct(App $app = null)
    {
        parent::__construct($app);
    }

    public function index(LoginRun $loginRun)
    {
        $loginRun->initLogin();
    }

    public function hello($name = 'ThinkPHP5')
    {

    }
}
