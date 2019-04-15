<?php
/**
 * 定义消息 一个功能一个常量数组
 * Created by PhpStorm.
 * User: 9Smile
 * Date: 2019/4/13
 * Time: 18:38
 * type: c = 公共功能消息 u = 用户功能消息 o = 订单功能消息
 */

return [
    //公共组
    'c' => [
        '200' => '访问成功',
    ],

    // 授权组
    'auth' => [
        '-100' => 'key not empty', //设置key不能为空
        '100' => 'auth is false' //授权状态是false
    ],

    // 用户组
    'u' => [
        '200' => '访问成功'
    ],

    //商品组
    'g' => [

    ],

    //订单组
    'o' => [

    ]

];