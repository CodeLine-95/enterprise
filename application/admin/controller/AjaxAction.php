<?php
namespace app\admin\controller;
use think\Controller;
use think\Cache;
use app\admin\model\Admin;
use app\admin\model\Rule;
class AjaxAction extends Controller{
  // 退出登陆
  public function logout(){
    session('user',NULL);
    $data = [
      'msg' => '退出成功！！！',
      'icon' => 6
    ];
    return json_encode($data);
  }
  //修改密码
  public function password(){
    if(request()->isPost()){
      $data = input('post.');
      $user= session('user');
      $pass =  cms_pwd_encode($data['pass']);
      $re = (new Admin)->where('id',$user['uid'])->update(array('user_pwd'=>$pass));
      if($re){
          session('user',NULL);
          $return = array('msg'=>"更改密码成功, 请重新登录",'icon'=>6);
      }else{
          $return = array('msg'=>"更改密码失败",'icon'=>5);
      }
      return json_encode($return);
    }else{
      return $this->fetch();
    }
  }
  /**
   * 获得一级菜单的所有子菜单
   * @param $id int  一级菜单的id编号
   * @return string
   */
  public function getChildMenu(){
    $parent_id = input('id');
    $user = session('user');
    $childMenus = (new Rule)->getChildMenu($parent_id,$user['rule']);
    $str = "";
    foreach ($childMenus as $cm){
      $str .= '<li class="layui-nav-item">';
      if (!isset($cm['url'])) {
        $str .= '<a href="javascript:;" lay-tips="'.$cm['name'].'" lay-direction="2">
          <i class="layui-icon '.$cm['icon'].'"></i>
          <cite>'.$cm['name'].'</cite>
        </a>';
      }else{
        $str .= '<a lay-href="'.$cm['url'].'" lay-tips="'.$cm['name'].'" lay-direction="2">
          <i class="layui-icon '.$cm['icon'].'"></i>
          <cite>'.$cm['name'].'</cite>
        </a>';
      }
      if(!empty($cm['child'])){
        $str .= '<dl class="layui-nav-child">';
        foreach($cm['child'] as $cd){
          $str .= '<dd><a lay-href="'.$cd['url'].'" >
            <i class="layui-icon '.$cd['icon'].'"></i>
            <cite>'.$cd['name'].'</cite>
          </a>
        </dd>';
        }
        $str .= '</dl>';
      }
    }
    if(empty($str)){
    $str="<script>alert('您没有操作权限')</script>";
    }
    return $str;
  }
  /**
   * 上传图片的提交实例
   * @param $file string 文件提交信息
   * @return string
   */
  public function upload(){
    $file = request()->file('file');//获取文件信息
    $path = 'uploads';//文件目录
    //创建文件夹
    if(!is_dir($path)){
      mkdir($path, 0755, true);
    }
    $info = $file->move($path);//保存在目录文件下
    if ($info && $info->getPathname()) {
      $data = [
        'status' => 1,
        'data' =>  '/'.$info->getPathname(),
      ];
      return json_encode($data);
    } else {
      return json_encode($file->getError());
    }
  }
  /**
   * 上传文件的提交实例
   * @param $file string 文件提交信息
   * @return string
   */
  public function uploadfile(){
    $file = request()->file('file');//获取文件信息
    $path = 'uploads/files';//文件目录
    //创建文件夹
    if(!is_dir($path)){
      mkdir($path, 0755, true);
    }
    $info = $file->move($path);//保存在目录文件下
    if ($info && $info->getPathname()) {
      $data = [
        'status' => 1,
        'data' =>  '/'.$info->getPathname(),
      ];
      return json_encode($data);
    } else {
      return json_encode($file->getError());
    }
  }
  /**
   * 字节转换兆
   * @param $Bytes
   * @return string
   */
  public function getFileSize($Bytes){
    $p = 0;
    $format='bytes';
    if($Bytes>0 && $Bytes<1024){
      $p = 0;
      return number_format($Bytes).' '.$format;
    }
    if($Bytes>=1024 && $Bytes<pow(1024, 2)){
      $p = 1;
      $format = 'KB';
    }
    if ($Bytes>=pow(1024, 2) && $Bytes<pow(1024, 3)) {
      $p = 2;
      $format = 'MB';
    }
    if ($Bytes>=pow(1024, 3) && $Bytes<pow(1024, 4)) {
      $p = 3;
      $format = 'GB';
    }
    if ($Bytes>=pow(1024, 4) && $Bytes<pow(1024, 5)) {
      $p = 3;
      $format = 'TB';
    }
    $Bytes /= pow(1024, $p);

    return number_format($Bytes, 3).' '.$format;
  }
  // 清除缓存
  public function delruntime(){
    $this->clear_sys_cache();
    $this->clear_temp_ahce();
    $this->clear_log_chache();
    return 1;
  }
  public function clear_sys_cache() {
    Cache::clear();
    return true;
  }
  // 清除模版缓存 不删除 temp目录
  public function clear_temp_ahce() {
    array_map( 'unlink', glob( TEMP_PATH.DS.'.php' ) );
    return true;
  }
  // 清除日志缓存 不删出log目录
  public function clear_log_chache() {
    $path = glob( LOG_PATH.'/' );
    foreach ($path as $item) {
      array_map( 'unlink', glob( $item.DS.'.' ) );
      rmdir( $item );
    }
    return true;
  }
}
