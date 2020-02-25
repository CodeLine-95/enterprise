<?php
namespace app\admin\controller;
use app\admin\controller\base\Base;
use app\admin\model\Admin;
use app\admin\model\Role;
class Admins extends Base{

    public function index(){
        $list = (new Admin)->field(true)->where('id',$this->user['uid'])->find();
        $this->assign('admin',$list);
        return $this->fetch();
    }

    /**
     * 用户列表
     */
    public function lists(){
        $get = request()->get();
        $where = [];
        if (isset($get['user_type'])){
            if (isset($get['user_name']) && !empty($get['user_name'])) {
                switch ($get['user_type']) {
                    case 1:
                        $where['user_name'] = $get['user_name'];
                        break;
                    // case 2:
                    //     $where['user_nick'] = $get['user_name'];
                    //     break;
                }
            }
        }
        $list = (new Admin)->field(true)->where('user_name','neq','admin')->where($where)->paginate(10);
        $this->assign('list',$list);
        $get['user_type'] = isset($get['user_type']) ? $get['user_type'] : 1;
        $get['user_name'] = isset($get['user_name']) ? $get['user_name'] : '';
        $this->assign('get',$get);
        return $this->fetch();
    }

    /**
     * 添加用户
     */
    public function add(){
        if(request()->isPost()){
            $post = json_decode(input('post.data'),true);
            $post['user_pwd'] = cms_pwd_encode($this->conf['pwd']);
            $post['user_host'] = request()->ip();
            $post['create_time'] = time();
            $post['user_status'] = 1;
            if (isset($post['role_id']) && !empty($post['role_id'])) {
                $res = db('admin')->where('user_name',$post['user_name'])->find();
                if ($res) {
                    $data = [
                        'msg'   => '该用户已存在，请勿重复添加！！',
                        'icon'  => 5
                    ];
                }else{
                    if ((new Admin)->save($post)) {
                        $data = [
                            'msg'   => '添加成功',
                            'icon'  => 6
                        ];
                    }else{
                        $data = [
                            'msg'   => '添加失败',
                            'icon'  => 5
                        ];
                    }
                }
            }else{
                $data = [
                    'msg'   => '未分配权限',
                    'icon'  => 5
                ];
            }
            return json_encode($data);
        }else{
            $roles = (new Role)->where(['id'=>['not in',1],'status'=>1])->select();
            $this->assign('roles',$roles);
            return $this->fetch();
        }
    }
    // 编辑人员
    public function edit($id=0){
        if(request()->isPost()){
            $post = json_decode(input('post.data'),true);
            $post['user_host'] = request()->ip();
            if ((new Admin)->update($post)) {
                $data = [
                    'msg'   => '编辑成功',
                    'icon'  => 6
                ];
            }else{
                $data = [
                    'msg'   => '编辑失败',
                    'icon'  => 5
                ];
            }
            return json_encode($data);
        }else{
            $admin = (new Admin)->where('id',$id)->find()->toArray();
            $this->assign('admin',$admin);
            $roles = (new Role)->where(['id'=>['not in',1],'status'=>1])->select();
            $this->assign('roles',$roles);
            return $this->fetch();
        }
    }
    // 删除员工账户
    public function del(){
        $id = json_decode(input('post.id'),true);
        if(Admin::destroy($id)){
            $return = array("msg"=>"删除成功","icon"=>6);
        }else{
            $return = array("msg"=>"删除失败","icon"=>5);
        }
        return json_encode($return);
    }
}
