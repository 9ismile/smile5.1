<?php
/**
 * Created by PhpStorm.
 * User: 9Smile
 * Date: 2019/4/13
 * Time: 17:57
 */

namespace src\common\model;

use think\Model;
use think\Validate;

class BaseModel extends Model
{
    protected $error = 0;

    protected $table;

    protected $rule = [];

    protected $msg = [];

    protected $Validate;

    public function __construct($data = [],Validate $validate){
        parent::__construct($data);
        $validate->rule([]);
        $validate->message([]);
        $this->Validate = $validate;
        $this->Validate->extend('no_html_parse', function ($value, $rule) {
            return true;
        });
    }



}