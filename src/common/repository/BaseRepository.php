<?php
/**
 * Created by PhpStorm.
 * User: 9Smile
 * Date: 2019/4/13
 * Time: 18:03
 */
namespace src\common\repository;

use src\common\model\BaseModel;
use think\Validate;

class BaseRepository
{
    protected $model = null;

    public function __construct(BaseModel $baseModel)
    {
        $this->model = $baseModel;
    }




}