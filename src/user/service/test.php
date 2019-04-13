<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/12
 * Time: 16:33
 */

namespace src\user\service;


use src\common\repository\BaseRepository;
use src\common\service\BaseService;

class test extends BaseService
{

    protected $authorize = true;

    public function __construct(BaseRepository $baseRepository)
    {
        parent::__construct($baseRepository);
    }

    public function index()
    {
        echo '12313';
    }
}