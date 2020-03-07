<?php
namespace app\api\controller;
use think\Controller;
use app\api\model\Users;
use think\Log;

class Login extends Controller
{
    /**
     * 验证码图片
     * @return \think\response\Json
     */
    public function vercode(){
        return json([
            'code'=>200,
            'msg'=>'获取成功',
            'data'=>'<img src="'.request()->domain().captcha_src().'" alt="captcha" onclick="javascript:this.src='.request()->domain().captcha_src().'?rand=+Math.random()" />'
        ]);
    }
    /**
     * 登录请求 [post]
     * @param string $vercode  验证码
     * @param string $user_name  用户名
     * @param string $user_pwd  密码
     * @function login_action
     */
    public function login_action(){
        try {
            if (request()->isPost()) {
                $post = request()->post();
                $res = (new Users())->where('user_name', $post['user_name'])->find();
                if (empty($res)) {
                    return json(['msg' => '账号错误', 'code' => 400]);
                } else {
                    if (cms_pwd_verify($post['user_pwd'], $res['user_pwd'])) {
                        if ($res['user_status'] == 0) {
                            return json(['msg' => '用户已被冻结', 'code' => 400]);
                        } else {
                            (new Users())->where('id', $res['id'])->update(['last_login' => time(), 'user_host' => request()->ip()]);
                            $session_user = array('uid' => $res['id'], 'username' => $res['user_name']);
                            return json(['msg' => '登录成功', 'code' => 200,'data'=>$session_user]);
                        }
                    } else {
                        return json(['msg' => '密码错误', 'code' => 400]);
                    }
                }
            } else {
                return json(['msg' => '请求错误', 'code' => 400]);
            }
        }catch (\Exception $e){
            Log::error($e);
            return json(['codeMsg'=>$e->getMessage(),'code'=>$e->getCode()]);
        }
    }

    /**
     * 注册用户  [post]
     * @return \think\response\Json
     */
    public function register(){
        try {
            if (request()->isPost()) {
                $params = request()->post();
                $params['user_pwd'] = cms_pwd_encode($params['user_pwd']);
                $params['user_nick'] = 'UID_'.randStr(10);
                $params['user_host'] = request()->ip();
                $params['create_time'] = time();
                $res = (new Users())->where('user_name', $params['user_name'])->find();
                if ($res) {
                    return json(['msg' => '该用户已存在，请勿重复添加！！', 'code' => 400]);
                } else {
                    if ((new Users())->save($params)) {
                        return json(['msg' => '注册成功', 'code' => 200]);
                    } else {
                        return json(['msg' => '注册失败', 'code' => 400]);
                    }
                }
            } else {
                return json(['codeMsg' => '请求错误', 'code' => 400]);
            }
        }catch (\Exception $e){
            Log::error($e);
            return json(['codeMsg'=>$e->getMessage(),'code'=>$e->getCode()]);
        }
    }

    /**
     * 修改密码  [post]
     * @param $user_pwd string 旧密码
     * @param $re_user_pwd string 新密码
     * @return \think\response\Json
     */
    public function update_pwd(){
        try {
            if(request()->isPost()){
                $params = request()->post();
                $user = (new Users())->where(['id'=>$params['uid']])->find();
                if (!$user){
                    return json(['codeMsg'=>'没有该用户','code'=>401]);
                }
                if(!cms_pwd_verify($params['user_pwd'],$user['user_pwd'])){
                    return json(['codeMsg'=>'旧密码错误','code'=>402]);
                }
                $re_pass =  cms_pwd_encode($params['re_user_pwd']);
                $re = (new Users())->where('id',$params['uid'])->update(['user_pwd'=>$re_pass]);
                if($re){
                    return json(['codeMsg'=>'SUCCESS','code'=>200]);
                }else{
                    return json(['codeMsg'=>"error",'code'=>400]);
                }
            }else{
                return json(['codeMsg' => '请求错误', 'code' => 400]);
            }
        }catch (\Exception $e){
            Log::error($e);
            return json(['codeMsg'=>$e->getMessage(),'code'=>$e->getCode()]);
        }
    }

    /**
     * 修改信息 [post]
     * @return \think\response\Json
     */
    public function update_user(){
        try {
            if (request()->isPost()){
                $params = request()->post();
                $user = (new Users())->where(['id'=>$params['uid']])->find();
                if (!$user){
                    return json(['codeMsg'=>'没有该用户','code'=>401]);
                }
                if (!isset($params['user_email']) || empty($params['user_email'])){
                    return json(['codeMsg'=>'邮箱不能为空','code'=>401]);
                }
                $params['id'] = $params['uid'];
                unset($params['uid']);
                $re = (new Users())->update($params);
                if($re){
                    return json(['codeMsg'=>'SUCCESS','code'=>200]);
                }else{
                    return json(['codeMsg'=>"error",'code'=>400]);
                }
            }else{
                return json(['codeMsg' => '请求错误', 'code' => 400]);
            }
        }catch (\Exception $e){
            Log::error($e);
            return json(['codeMsg'=>$e->getMessage(),'code'=>$e->getCode()]);
        }
    }
}