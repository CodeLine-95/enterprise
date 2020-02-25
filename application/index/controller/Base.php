<?php
namespace app\index\controller;

use think\Controller;

class Base extends Controller
{
    protected $user;
    public function _initialize()
    {
        $this->user = session('users');
        $user = $this->user;
        if(!$user['uid']||!$user['username']){
            $this->redirect('login/index');
        }else{
            $this->assign('user',session('users'));
        }
        $controller = request()->controller();
        $this->assign([
            'controller'  => $controller
        ]);
    }
}