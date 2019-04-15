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
 * @param string $type 功能组消息类型
 * @param array $data
 * @param string $msg
 * @return mixed
 */

function packageMessage($code = 200, $type = 'c', $data = array(), $msg = ''){
    $msg = empty($msg) ? getMessageByCode($code,$type) : $msg;
    $result = array(
        'code' => $code,
        'data' => $data,
        'status' => $code > 0 ? 'success': 'error',
        'msg' => $msg,
    );
    return $result;
}

function outMessageJson($code = 200,  $type = 'c', $data = array(), $msg = ''){
    return json_encode(packageMessage($code, $type, $data, $msg));
}

function outMessageArray($code = 200, $type = 'c', $data = array(), $msg = ''){
    return packageMessage($code, $type, $data, $msg);
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
        case 'auth' :
            $message_code = $message_code_array['auth'];
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
    if(isset($message_code[$code])){
        $msg = $message_code[$code];
    }else{
        $msg = 'Code undefined ';
    }
    return $msg;
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