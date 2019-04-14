<?php
/**
 * Created by PhpStorm.
 * User: 9Smile
 * Date: 2019/4/12
 * Time: 16:33
 */

namespace src\common\service;


use src\common\repository\BaseRepository;
use think\Request;

class BaseService
{
    protected $uid = ''; // 用户uid
    protected $group_id = ''; // 用户操作组
    protected $repository = []; // 模型仓库
    protected $authorize = true; // 是否需要授权登录
    protected $authority = []; //操作权限
    protected $operation = false;

    public function __construct(BaseRepository $baseRepository)
    {
        $this->init();
        if(!$this->operation){

        }
    }

    private function init()
    {
        return $this->isAuthorize();
    }

    private function isAuthorize()
    {
        if(empty($this->uid) && $this->authorize){
        }
    }
}