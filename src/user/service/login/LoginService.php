<?php
/**
 * Created by PhpStorm.
 * User: 9Smile
 * Date: 2019/4/15
 * Time: 14:43
 */
namespace src\user\service\login;

use src\common\api\BaseApi;
use src\common\service\BaseService;
use src\user\repository\LoginRepository;

class LoginService extends BaseService implements BaseApi
{
    private $userRepository = null;

    public function __construct(LoginRepository $userRepository)
    {
        parent::__construct();
        $this->userRepository = $userRepository;
    }

    public function initLogin()
    {

        $this->userRepository->getUserInfo(['uid'=>1],'*');
    }
}