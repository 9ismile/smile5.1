<?php
/**
 * Created by PhpStorm.
 * User: 9Smile
 * Date: 2019/4/16
 * Time: 9:43
 */

namespace src\user\repository;


use src\common\model\BaseModel;
use src\common\repository\BaseRepository;
use src\user\model\SysUserModel;

class LoginRepository extends BaseRepository
{
    private $sysUserModel = null;

    public function __construct(SysUserModel $sysUserModel)
    {
        parent::__construct();

        $this->sysUserModel = $sysUserModel;
    }

    public function getUserInfo($condition = [], $filed = '*')
    {
        return $this->sysUserModel->getInfo($condition, $filed);
    }

}