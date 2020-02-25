<?php
namespace app\admin\controller\base;
use app\admin\model\Conf as Confs;
use think\Controller;
use app\admin\model\Rule;
use app\admin\model\Conf as ConfModel;
class Base extends Controller
{

  protected $user;
  protected $conf;
  protected $userid;
  public function _initialize(){
    $this->user = session('user');
    $user = $this->user;
    if(!$user['uid']||!$user['username']){
      $this->redirect('login/login');
    }else{
      $this->assign('user',session('user'));
    }
    //默认配置
    $this->conf = (new ConfModel)->where('id',1)->find();
    $this->assign('conf',$this->conf);
    $auth = new \auth\Auth();
    $module     = strtolower(request()->module());
    $controller = strtolower(request()->controller());
    $action     = strtolower(request()->action());
    $url        = $module."/".$controller."/".$action;
    $this->assign('url',$url);
    //跳过检测以及主页权限的操作
    $user['rulename'][] = 'admin/index/index';
    $user['rulename'][] = 'admin/index/console';
    $user['rulename'][] = 'admin/index/upload';
    $user['rulename'][] = 'admin/index/uploadfile';
    //实时检测用户使用权限的操作
    if($user['uid']!=1){
      if(!in_array($url,$user['rulename'])){
        if(!$auth->check($url,$user['uid'])){
        // $this->error('抱歉，您没有操作权限','admin/index/index','1');
          echo"<script>alert('抱歉，您没有操作权限')</script>";
          echo "<div style='font-size:30px;text-align:center;'>抱歉，您没有操作权限</div>";
         die;
        }
      }
    }
    $system = (new Confs)->find();
    $this->assign('system',$system);
    $this->assign('publics',$this->user);
    //分配权限功能链接
    $node = new Rule();
    $this->assign([
      'childMenu'  =>  $node->getMenu($user['rule'])
    ]);
    //默认配置
    $this->conf = (new ConfModel)->where('id',1)->find();
  }

}
