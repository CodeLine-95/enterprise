<?php
namespace app\admin\controller;
use app\admin\controller\base\Base;
use app\admin\model\Users as User;
class Users extends Base{

    /**
     * 个人资料
     */
    public function index(){
        $list = (new User())->field(true)->where('id',$this->user['uid'])->find();
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
                    case 2:
                        $where['user_nick'] = $get['user_name'];
                        break;
                }
            }
        }
        $list = (new User())->field(true)->where($where)->paginate(10);
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
            $post['user_city'] = $post['user_city'].'&nbsp;'.$post['user_city1'];
            $res = (new User())->where('user_name',$post['user_name'])->find();
            if ($res) {
                $data = [
                    'msg'   => '该用户已存在，请勿重复添加！！',
                    'icon'  => 5
                ];
            }else{
                if ((new User())->save($post)) {
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
            return json_encode($data);
        }else{
            return $this->fetch();
        }
    }

    /**
     * 编辑用户
     */
    public function edit(){
        if(request()->isPost()){
            $post = json_decode(input('post.data'),true);
            $post['user_city'] = $post['user_city'].'&nbsp;'.$post['user_city1'];
            if ((new User())->update($post)) {
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
            $id = input('id');
            $field = (new User())->where('id',$id)->find()->toArray();
            $citys = explode('&nbsp;',$field['user_city']);
            $field['user_city'] = $citys[0];
            $field['user_city1'] = $citys[1];
            $this->assign('field',$field);
            return $this->fetch();
        }
    }

    /**
     * 删除用户
     * @return false|string
     */
    public function del(){
        $id = json_decode(input('post.id'),true);
        if(User::destroy($id)){
            $return = array("msg"=>"删除成功","icon"=>6);
        }else{
            $return = array("msg"=>"删除失败","icon"=>5);
        }
        return json_encode($return);
    }

    /**
     * 重置密码
     * @return false|string
     */
    public function reset_password(){
        if (request()->isPost()) {
            $params = request()->post();
            $params['user_pwd'] = cms_pwd_encode($this->conf['pwd']);
            if ((new User())->update($params)) {
                return json_encode(['msg'=>'重置成功','code'=>200]);
            }else{
                return json_encode(['msg'=>'重置失败','code'=>400]);
            }
        }else{
            return json_encode(['msg'=>'请求错误','code'=>400]);
        }
    }
}
