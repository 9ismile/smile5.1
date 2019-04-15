<?php
/**
 * Created by PhpStorm.
 * User: 9Smile
 * Date: 2019/4/15
 * Time: 9:16
 */
namespace app\facade;

use think\Facade;

class AuthorityFacade extends Facade
{
    protected static function getFacadeClass()
    {
        return 'app\common\controller\Authority';
    }

}