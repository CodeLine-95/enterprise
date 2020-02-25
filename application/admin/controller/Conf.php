<?php
namespace app\admin\controller;
use app\admin\controller\base\Base;
use app\admin\model\Conf as Confs;
class Conf extends Base
{
   public function index()
   {
   	 if(request()->isPost()){
   	 	$data = json_decode(input('post.data'),true);
   	 	$system = (new Confs)->find();
            if (cms_pwd_verify($data['pwd'],$system['defaultpwd'])) {
               $data['defaultpwd'] = $system['defaultpwd'];
            }else{
               $data['defaultpwd'] = cms_pwd_encode($data['pwd']);
               $data['pwd'] = $data['pwd'];
            }

   	 	if(empty($system)){
   	 		$re = (new Confs)->insert($data);
   	 	}else{
   	 		$data['id'] = $system['id'];
   	 		$re = (new Confs)->update($data);
   	 	}
   	 	if($re){
   	 		$return = array('msg'=>"编辑系统信息成功",'icon'=>6);
   	 	}else{
   	 		$return = array('msg'=>"编辑系统信息失败",'icon'=>5);
   	 	}
   	 	return json_encode($return);
   	 }else{
   	 	$system = (new Confs)->find();
   	 	$this->assign('system',$system);
   	 	return $this->fetch();
   	 }
   }
}