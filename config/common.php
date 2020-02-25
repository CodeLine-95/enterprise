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
/**
 * 本周
 * @param string $str
 * @return bool| string
 */
function newWeek(){
  return strtotime(date("Y-m-d H:i:s",mktime(0, 0 , 0,date("m"),date("d")-date("w")+1,date("Y"))));
}

function Week_list(){
  $sdefaultDate = date("Y-m-d");
  //$first = 1 表示每周星期一为开始日期 0表示每周日为开始日期
  $first = 1;
  //获取当前周的第几天 周日是 0 周一到周六是 1 - 6
  $w = date('w',strtotime($sdefaultDate));
  //获取本周开始日期，如果$w是0，则表示周日，减去 6 天
  $week_start = date('Y-m-d',strtotime("$sdefaultDate -".($w ? $w - $first : 6).' days'));
  //本周结束日期 转换成时间戳
  $week_end = strtotime(date('Y-m-d',strtotime("$week_start +6 days")).' 23:59:59');
  $week_start = strtotime(date('Y-m-d',strtotime("$sdefaultDate -".($w ? $w - $first : 6).' days')).' 00:00:00');
  return array($week_start,$week_end);
}
/**
 * 本月天数
 * @param string $str
 * @return bool|array
 */
function getMonth($date){
  $firstday = date("Y-m-01",strtotime($date));
  $lastday = date("Y-m-d",strtotime("$firstday +1 month -1 day"));
  return array(strtotime($firstday),strtotime($lastday));
}
/**
 * 本年时间戳初始和结束
 * @param string $str
 * @return bool|array
 */
function getYear(){
  $begin_year = strtotime(date("Y",time())."-1"."-1"); //本年开始
  $end_year   = strtotime(date("Y",time())."-12"."-31"); //本年结束
  return array($begin_year,$end_year);
}
/**
 * 密码加密
 * @param string $str
 * @return bool|string
 */
function cms_pwd_encode($str=''){
    $key_secret = config('database')['auto_code'];
    $pwd_encode = password_hash('###'.$key_secret.$str,PASSWORD_DEFAULT);
    return $pwd_encode;
}

/**
 * 密码验证
 * @param string $verifyStr
 * @param $passwordHash
 * @return bool
 */
function cms_pwd_verify($verifyStr='',$passwordHash){
    $key_secret = config('database')['auto_code'];
    if (password_verify('###'.$key_secret.$verifyStr,$passwordHash)) {
        return true;
    } else {
        return false;
    }
}

function findNum($str=''){
  $str=trim($str);
  if(empty($str)){return '';}
  $result='';
  for($i=0;$i<strlen($str);$i++){
    if(is_numeric($str[$i])){
      $result.=$str[$i];
    }
  }
  return (int)$result;
}

/**
 * 随机字符
 * @param string
 * @return bool
 */
function randStr($length=5){
  if(!is_int($length) || $length < 0) {
    return false;
  }
  $char = '0123456789abcdefghijklmnopqrstuvwxyz';
  $string = '';
  for($i = $length; $i > 0; $i--) {
    $string .= $char[mt_rand(0, strlen($char) - 1)];
  }
  return $string;
}

/**
 * curl get 请求
 * @param $url
 * @return mixed
 */
function crm_curl_get($url,$code=false){
	$url = urldecode($url);
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_FAILONERROR, true);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_AUTOREFERER, true);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POST, false);
  curl_setopt($ch, CURLOPT_TIMEOUT, 5);
  $content = curl_exec($ch);
  if($content === false){
    return 'Curl error: ' . curl_error($ch);
	}else{
		$httpcode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
    curl_close($ch);
    if ($code) {
        return $httpcode;
    }else{
        return $content;
    }
	}
}

/**
* 解析xml格式数据
*/
function parseXml($xmls){
    $array = [];
    $xmls = $xmls;
    foreach ($xmls as $key => $xml) {
	    $count = count($xml);
        if ($count == 0) {
            $res = (string) $xml;
        } else {
            $res = parseXml($xml);
        }
        $array[$key] = $res;
    }
    return $array;
}

/**
* 短信消息提醒
* @param $content 签名+姓名+发送的内容
* @param $tel   发送的手机号
* @return $ress  解析成数组的返回值
*/
function message($content,$tel){
  //发送短信
  $userid = '6488';
  $account = 'a10503';
  $password = '112233';
  $action = 'send';
  $sendTime= '';
  $extno= '';
  $send_api = 'http://dx1.xitx.cn:8888/sms.aspx?action='.$action.'&userid='.$userid.'&account='.$account.'&password='.$password.'&mobile='.$tel.'&content='.$content.'&sendTime='.$sendTime.'&extno='.$extno;
  $res = crm_curl_get($send_api);
  $xmls = new \SimpleXMLElement($res);
  $ress = parseXml($xmls);
  return $ress;
}

/**
 * api 数据返回
 * @param  [int] $code [结果码 200:正常/4**数据问题/5**服务器问题]
 * @param  [string] $msg  [接口要返回的提示信息]
 * @param  [array]  $data [接口要返回的数据]
 * @return [string]       [最终的json数据]
 */
function msg($code, $msg = '', $data = []) {
	$return_data['code'] = $code . '00';
	$return_data['msg'] = $msg;
	$return_data['data'] = $data;
	if ($return_data['code'] == '200') {
		if ($return_data['msg'] != '') {
			$return_data['msg'] = $return_data['msg'];
		} else {
			if (empty($msg)) {
				$return_data['msg'] = 'ok';
			}
			$return_data['msg'] = 'ok';

		}
	}
	echo json_encode($return_data);die;
}

//获得访客真实ip
function Getip(){
    $ip = '';
    $ips = [];
    if (! empty($_SERVER["HTTP_CLIENT_IP"])) {
        $ip = $_SERVER["HTTP_CLIENT_IP"];
    }
    if (! empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { // 获取代理ip
        $ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
    }
    if ($ip) {
        $ips = array_unshift($ips, $ip);
    }

    $count = count($ips);
    for ($i = 0; $i < $count; $i ++) {
        if (! preg_match("/^(10|172\.16|192\.168)\./i", $ips[$i])) { // 排除局域网ip
            $ip = $ips[$i];
            break;
        }
    }
    $tip = empty($_SERVER['REMOTE_ADDR']) ? $ip : $_SERVER['REMOTE_ADDR'];
    if ($tip == "127.0.0.1") { // 获得本地真实IP
        return $this->get_onlineip();
    } else {
        return $tip;
    }
}
//获得访客浏览器类型
function GetBrowser(){
    if(!empty($_SERVER['HTTP_USER_AGENT'])){
        $br = $_SERVER['HTTP_USER_AGENT'];
        if (preg_match('/MSIE/i',$br)){
           $br = 'MSIE';
        }
        elseif (preg_match('/Firefox/i',$br)){
           $br = 'Firefox';
        }elseif (preg_match('/Chrome/i',$br)){
           $br = 'Chrome';
        }elseif (preg_match('/Safari/i',$br)){
           $br = 'Safari';
        }elseif (preg_match('/Opera/i',$br)){
           $br = 'Opera';
        }else {
           $br = 'Other';
        }
        return $br;
    }else{
       return "";
    }
}
