<?php
/**
 * Created by PhpStorm.
 * User: 9Smile
 * Date: 2019/4/13
 * Time: 17:57
 */

namespace src\common\model;

use think\Model;
use think\facade\Validate;
use think\Db;

class BaseModel extends Model
{
    protected $error = 0;

    protected $table;

    protected $rule = [];

    protected $msg = [];

    protected $Validate;

    public function __construct($data = []){
        parent::__construct($data);
        Validate::rule([]);
        Validate::message([]);
        Validate::message([]);
        Validate::extend('no_html_parse', function ($value, $rule) {
            return true;
        });
    }


    /**
     * 数据库开启事务
     */
    public function startTrans()
    {
        Db::startTrans();
    }

    /**
     * 数据库事务提交
     */
    public function commit()
    {
        Db::commit();
    }

    /**
     * 数据库事务回滚
     */
    public function rollback()
    {
        Db::rollback();
    }

    /**
     * 列表查询
     * @param $page_index
     * @param $page_size
     * @param $condition
     * @param $order
     * @param $field
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function pageQuery($page_index, $page_size, $condition, $order, $field)
    {
        $count = $this->where($condition)->count();
        if ($page_size == 0) {
            $list = $this->field($field)
                ->where($condition)
                ->order($order)
                ->select();
            $page_count = 1;
        } else {
            $start_row = $page_size * ($page_index - 1);
            $list = $this->field($field)
                ->where($condition)
                ->order($order)
                ->limit($start_row . "," . $page_size)
                ->select();
            if ($count % $page_size == 0) {
                $page_count = $count / $page_size;
            } else {
                $page_count = (int) ($count / $page_size) + 1;
            }
        }
        return array(
            'data' => $list,
            'total_count' => $count,
            'page_count' => $page_count
        );
    }

    /**
     * 获取条件列表
     * @param $condition
     * @param $field
     * @param $order
     * @param string $group
     * @return array|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getQuery($condition, $field, $order, $group='')
    {
        $order = trim($order);
        if(empty($group))
        {
            $list = $this->field($field)->where($condition)->order($order)->select();
        }else{
            $list = $this->field($field)->where($condition)->group($group)->order($order)->select();
        }
        return $list;
    }

    /**
     * 获取单条记录的基本信息
     *
     * @param $condition
     * @param string $field
     */
    public function getInfo($condition = [], $field = '*')
    {
        $info = $this->where($condition)
            ->field($field)
            ->find();
        return $info;
    }

    /**
     * 查询数据的数量
     * @param $condition
     * @return float|string
     */
    public function getCount($condition)
    {
        $count = $this->where($condition)
            ->count();
        return $count;
    }

    /**
     * 查询条件数量
     * @param $condition
     * @param $field
     * @return float|int
     */
    public function getSum($condition, $field)
    {
        $sum = $this->where($condition)
            ->sum($field);
        if(empty($sum))
        {
            return 0;
        }else
            return $sum;
    }

    /**
     * 查询数据最大值
     * @param $condition
     * @param $field
     * @return int|mixed
     */
    public function getMax($condition, $field)
    {
        $max = $this->where($condition)
            ->max($field);
        if(empty($max))
        {
            return 0;
        }else
            return $max;
    }

    /**
     * 查询数据最小值
     * @param $condition
     * @param $field
     * @return int|mixed
     */
    public function getMin($condition, $field)
    {
        $min = $this->where($condition)
            ->min($field);
        if(empty($min))
        {
            return 0;
        }else
            return $min;
    }

    /**
     * 查询数据均值
     * @param $condition
     * @param $field
     * @return float|int
     */
    public function getAvg($condition, $field)
    {
        $avg = $this->where($condition)
            ->avg($field);
        if(empty($avg))
        {
            return 0;
        }else
            return $avg;
    }

    /**
     * 查询第一条数据
     * @param $condition
     * @param $order
     * @return mixed|string
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getFirstData($condition, $order)
    {
        $data = $this->where($condition)->order($order)
            ->limit(1)->select();
        if(!empty($data))
        {
            return $data[0];
        }else
            return '';
    }

    /**
     * 修改表单个字段值
     * @param $pk_name
     * @param $pk_id
     * @param $field_name
     * @param $field_value
     * @return bool
     */
    public function ModifyTableField($pk_name, $pk_id, $field_name, $field_value)
    {
        $data = array(
            $field_name => $field_value
        );
        $res = $this->save($data,[$pk_name => $pk_id]);
        return $res;
    }


}