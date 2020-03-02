<?php
namespace app\api\controller;
use think\Controller;
use app\api\model\Users;

class Login extends Controller
{
    /**
     * 登录请求
     * @param string $vercode  验证码
     * @param string $user_name  用户名
     * @param string $user_pwd  密码
     * @function login_action
     */
    public function login_action(){
        if (request()->isPost()) {
            $post = request()->post();
            if(!captcha_check($post['vercode'])){
                return json(['msg'=>'验证码错误','code'=>400]);
            }else{
                $res = (new Users())->where('user_name',$post['user_name'])->find();
                if(empty($res)){
                    return json(['msg'=>'账号错误','code'=>400]);
                }else{
                    if (cms_pwd_verify($post['user_pwd'],$res['user_pwd'])) {
                        if ($res['user_status'] == 0) {
                            return json(['msg'=>'用户已被冻结','code'=>400]);
                        }else{
                            (new Users())->where('id',$res['id'])->update(['last_login' => time(), 'user_host'  => request()->ip()]);
                            $session_user = array('uid' => $res['id'], 'username' => $res['user_name']);
                            session('users', $session_user);
                            return json(['msg'=>'登录成功','code'=>200]);
                        }
                    }else {
                        return json(['msg'=>'密码错误','code'=>400]);
                    }
                }
            }
        }else{
            return json(['msg'=>'请求错误','code'=>400]);
        }
    }
}