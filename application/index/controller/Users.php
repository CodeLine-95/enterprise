<?php
namespace app\index\controller;
use app\index\model\Orders;
use app\index\model\Users as UsersModel;
class Users extends Base
{
    // 退出登陆
    public function logout(){
      session('users',NULL);
      return json(['msg'=>'退出成功','code'=>200]);
    }

    public function password(){
      $user = (new UsersModel())->where(['id'=>$this->user['uid']])->find();
      $this->assign([
          'user'  => $user
      ]);
      return $this->fetch();
    }
    /**
     * 修改密码
     */
    public function edit_pwd(){
        if (request()->isPost()){
            $post = request()->post();
            $encode_pwd = cms_pwd_encode($post['user_pwd']);
            if (cms_pwd_verify($post['user_pwd'],$encode_pwd)) {
                $post['user_pwd'] = cms_pwd_encode($post['user_pwd_news']);
                if ((new UsersModel())->update($post)) {
                    return json(['msg'=>'保存成功','code'=>200]);
                }else{
                    return json(['msg'=>'保存失败','code'=>400]);
                }
            }else{
                return json(['msg'=>'旧密码错误','code'=>400]);
            }
        }else{
            return json(['msg'=>'请求错误','code'=>400]);
        }
    }

    /**
     * 个人资料
     */
    public function users(){
        if (request()->isPost()){
            $post = request()->post();
            $post['user_city'] = $post['user_city'].'&nbsp;'.$post['user_city1'];
            if ((new UsersModel())->update($post)) {
                $data = [
                    'msg'   => '保存成功',
                    'icon'  => 6
                ];
            }else{
                $data = [
                    'msg'   => '保存失败',
                    'icon'  => 5
                ];
            }
            return json($data);
        }else{
            $user = (new UsersModel())->where(['id'=>$this->user['uid']])->find();
            if (!empty($user['user_city'])) {
                $citys = explode('&nbsp;',$user['user_city']);
                $user['user_city'] = $citys[0];
                $user['user_city1'] = $citys[1];
            }else{
                $user['user_city'] = '';
                $user['user_city1'] = '';
            }
            $this->assign([
                'user'  => $user
            ]);
            return $this->fetch();
        }
    }

    public function orders(){
        $orders = (new Orders())->where(['userID'=>$this->user['uid']])->paginate(5);
        $this->assign([
            'orders'   => $orders
        ]);
        return $this->fetch();
    }

    public function orders_send(){
        $id = input('post.id');
        $params['id'] = $id;
        $params['status'] = 2;
        if ((new Orders())->update($params)) {
            return json(['msg'   => '发货成功', 'icon'  => 6]);
        }else{
            return json(['msg'   => '发货失败', 'icon'  => 5]);
        }
    }

    public function orders_del(){
        $id = json_decode(input('post.id'),true);
        if(Orders::destroy($id)){
            $return = array("msg"=>"删除成功","icon"=>6);
        }else{
            $return = array("msg"=>"删除失败","icon"=>5);
        }
        return json($return);
    }
}
