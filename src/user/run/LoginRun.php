<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/12
 * Time: 16:33
 */

namespace src\user\run;

use src\common\service\BaseService;
use src\user\service\login\LoginService;

class LoginRun extends BaseService
{
    use LoginService;

    public function __construct()
    {
        parent::__construct();
    }

}