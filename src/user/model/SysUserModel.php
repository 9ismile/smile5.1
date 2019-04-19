<?php
/**
 * Created by PhpStorm.
 * User: 9Smile
 * Date: 2019/4/15
 * Time: 17:37
 */

namespace src\user\model;

use src\common\model\BaseModel;

class SysUserModel extends BaseModel
{
    protected $table = 'sys_user';

    protected $rule = [
        'uid' => '',

    ];

    protected $msg = [
        'uid' => '',
    ];

}