<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------
// 应用公共文件



// 应用公共文件

/*************************** api开发辅助函数 **********************/
/**
 * 封装api返回数据
 * @param int $code
 * @param array $data
 * @param string $msg
 * @param string $type 功能组消息类型
 * @return mixed
 */

function packageMessage($code = 200, $data = array(), $msg = '', $type = 'c'){
    $msg = empty($msg) ? getMessageByCode($code,$type) : $msg;
    $result = array(
        'code' => $code,
        'data' => $data,
        'status' => $code > 0 ? 1 : 0,
        'msg' => $msg,
    );
    return $result;
}

function outMessageJson($code = 200, $data = array(), $msg = '', $type = 'c'){
    return json_decode(packageMessage($code, $data, $msg, $type));
}

function outMessageArray($code = 200, $data = array(), $msg = '', $type = 'c'){
    return packageMessage($code, $data, $msg, $type);
}


/**
 * 获取code消息
 * @param int $code
 * @param string $type c = 公共组消息; u = 用户组消息; o = 订单组消息;
 * @return mixed|string
 */
function getMessageByCode($code = 200, $type = 'c')
{
    $message_code_array = require_once('messageCode.php');
    $message_code = [];
    switch ($type){
        case 'c' :
            $message_code = $message_code_array['c'];
            break;
        case 'u' :
            $message_code = $message_code_array['u'];
            break;
        case 'o':
            $message_code = $message_code_array['o'];
            break;
        default:
            $message_code = $message_code_array['c'];
            break;
    }
    $msg = '';
    if(isset($code,$message_code)){
        $msg = $message_code[$code];
    }else{
        $msg = 'Code undefined ';
    }
    return $msg;
}


/**
 * @param null $msg    返回正确的提示信息
 * @param flag success CURD 操作成功
 * @param array $data  具体返回信息
 * Function descript: 返回带参数，标志信息，提示信息的json 数组
 *
 */



function returnApiSuccess($msg = null,$data = array()){
    $result = array(
        'flag' => 'Success',
        'msg' => $msg,
        'data' =>$data
    );
    print json_encode($result);
}

/**
 * @param null $msg    返回具体错误的提示信息
 * @param flag success CURD 操作失败
 * Function descript:返回标志信息 ‘Error’，和提示信息的json 数组
 */
function returnApiError($msg = null){
    $result = array(
        'flag' => 'Error',
        'msg' => $msg,
    );
    print json_encode($result);
}

/**
 * @param null $msg    返回具体错误的提示信息
 * @param flag success CURD 操作失败
 * Function descript:返回标志信息 ‘Error’，和提示信息，当前系统繁忙，请稍后重试；
 */
function returnApiErrorExample(){
    $result = array(
        'flag' => 'Error',
        'msg' => '当前系统繁忙，请稍后重试！',
    );
    print json_encode($result);
}

/**
 * @param null $data
 * @return array|mixed|null
 * Function descript: 过滤post提交的参数；
 *
 */

function checkDataPost($data = null){
    if(!empty($data)){
        $data = explode(',',$data);
        foreach($data as $v){
            if((!isset($_POST[$v]))||(empty($_POST[$v]))){
                if($_POST[$v]!==0 && $_POST[$v]!=='0'){
                    returnApiError($v.'值为空！');
                }
            }
        }
        unset($data);
        $data = I('post.');
        unset($data['_URL_'],$data['token']);
        return $data;
    }
}

/**
 * @param null $data
 * @return array|mixed|null
 * Function descript: 过滤get提交的参数；
 *
 */
function checkDataGet($data = null){
    if(!empty($data)){
        $data = explode(',',$data);
        foreach($data as $v){
            if((!isset($_GET[$v]))||(empty($_GET[$v]))){
                if($_GET[$v]!==0 && $_GET[$v]!=='0'){
                    returnApiError($v.'值为空！');
                }
            }
        }
        unset($data);
        $data = I('get.');
        unset($data['_URL_'],$data['token']);
        return $data;
    }
}