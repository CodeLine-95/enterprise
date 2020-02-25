<?php
namespace app\index\controller;

use think\Controller;
use app\index\model\Users;

class Login extends Controller
{
    public function index(){
        return $this->fetch();
    }

    /**
     * @function login_action
     */
    public function login_action(){
        if (request()->isPost()) {
            $post = request()->post();
            if(!captcha_check($post['vercode'])){
                $data = [
                    'msg' => '验证码输入不正确',
                    'icon' => 5
                ];
            }else{
                $res = (new Users())->where('user_name',$post['user_name'])->find();
                if(empty($res)){
                    $data = [
                        'msg' => '账号错误，请重新填写！！！',
                        'icon' => 5
                    ];
                }else{
                    if (cms_pwd_verify($post['user_pwd'],$res['user_pwd'])) {
                        if ($res['user_status'] == 0) {
                            $data = [
                                'msg' => '用户已被冻结！',
                                'icon' => 5
                            ];
                        }else{
                            $update = [
                                'last_login' => time(),
                                'user_host'  => request()->ip()
                            ];

                            (new Users())->where('id',$res['id'])->update($update);
                            $session_user = array(
                                'uid' => $res['id'],
                                'username' => $res['user_name'],
                            );
                            session('users', $session_user);
                            $data = [
                                'msg'  => '登录成功，正在跳转中.....',
                                'icon'  => 6,
                            ];
                        }
                    }else {
                        $data = [
                            'msg' => '密码错误，请重新填写！！！',
                            'icon' => 5
                        ];
                    }
                }
            }
            return json($data);
        }
    }

    public function zhuce(){
      return $this->fetch();
    }

    /**
     * @function zhuce_action
     */
    public function zhuce_action(){
        if (request()->isPost()) {
            $post = request()->post();
            if(!captcha_check($post['vercode'])){
                return json(['msg'=>'验证码输入不正确','icon'=>5]);
            }else{
                if ($post['user_pwd'] != $post['user_repwd']) {
                    return json(['msg'=>'两次输入的密码不正确','icon'=>5]);
                }
                $post['user_pwd'] = cms_pwd_encode($post['user_pwd']);
                $res = (new Users())->where('user_name',$post['user_name'])->find();
                if ($res) {
                    return json(['msg'=>'该用户已注册,请登录','icon'=>5]);
                }else{
                    if ((new Users())->save($post)) {
                        return json(['msg'=>'注册成功,请登录','icon'=>6]);
                    }else{
                        return json(['msg'=>'注册失败,请重新注册','icon'=>5]);
                    }
                }
            }
        }else{
          return json(['msg'=>'请求错误','icon'=>5]);
        }
    }
}
