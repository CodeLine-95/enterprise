<?php
namespace app\admin\controller;

use app\admin\controller\base\Base;
use app\admin\Model\Enterprise as EnterpriseModel;
use app\admin\model\Users;

class Enterprise extends Base
{
    public function lists(){
        $get = request()->get();
        $where = [];
        if (isset($get['type'])){
            if (isset($get['name']) && !empty($get['name'])) {
                switch ($get['type']) {
                    case 1:
                        $where['name'] = ['like','%'.$get['name'].'%'];
                        break;
                }
            }
        }
        $list = (new EnterpriseModel())->where($where)->paginate(10);
        if ($list){
            foreach ($list as $k=>$l){
                switch ($l['status']){
                    case 0:
                        $list[$k]['status_name'] = '已申请';
                        break;
                    case 1:
                        $list[$k]['status_name'] = '审核中';
                        break;
                    case 2:
                        $list[$k]['status_name'] = '已通过';
                        break;
                    case 3:
                        $list[$k]['status_name'] = '未通过';
                        break;
                    default:
                        $list[$k]['type_name'] = '';
                }
                switch ($l['type']){
                    case 1:
                        $list[$k]['type_name'] = '企业工商营业执照';
                        break;
                    case 2:
                        $list[$k]['type_name'] = '其他资质证件';
                        break;
                    default:
                        $list[$k]['type_name'] = '';
                }
                $user = (new Users())->where(['id'=>$l['uid']])->find();
                $list[$k]['u_name'] = $user['user_name'];
            }
        }
        $this->assign('list',$list);
        $get['type'] = isset($get['type']) ? $get['type'] : 1;
        $get['name'] = isset($get['name']) ? $get['name'] : '';
        $this->assign('get',$get);
        return $this->fetch();
    }

    public function add(){
        if (request()->isPost()){
            $params = request()->post();
            $field = (new Enterprise())->where(['name'=>$params['name'],'credit_id'=>$params['credit_id'],'uid'=>$params['uid']])->find();
            if ($field){
                return json(['codeMsg' => '该企业以申请注册，请查看相关信息', 'code' => 400]);
            }
            $params['create_t'] = time();
            $params['status'] = 1;
            if ((new EnterpriseModel())->save($params)){
                return json(['msg'   => '添加成功', 'icon'  => 6]);
            }else{
                return json(['msg'   => '添加失败', 'icon'  => 5]);
            }
        }else{
            return $this->fetch();
        }
    }

    public function edit(){
        if (request()->isPost()){
            $params = request()->post();
            $params['update_t'] = time();
            if ((new EnterpriseModel())->update($params)){
                return json(['msg'   => '编辑成功', 'icon'  => 6]);
            }else{
                return json(['msg'   => '编辑失败', 'icon'  => 5]);
            }
        }else{
            $id = input('id');
            $field = (new EnterpriseModel())->where(['id'=>$id])->find();
            $this->assign('field',$field);
            return $this->fetch();
        }
    }

    public function audit(){
        if (request()->isPost()){
            $params = request()->post();
            $params['update_t'] = time();
            if ((new EnterpriseModel())->update($params)){
                return json(['msg'   => '审核成功', 'icon'  => 6]);
            }else{
                return json(['msg'   => '审核失败', 'icon'  => 5]);
            }
        }else{
            $id = input('id');
            $field = (new EnterpriseModel())->where(['id'=>$id])->find();
            $this->assign('field',$field);
            return $this->fetch();
        }
    }

    public function del(){
        $id = json_decode(input('post.id'),true);
        if(EnterpriseModel::destroy($id)){
            $return = array("msg"=>"删除成功","icon"=>6);
        }else{
            $return = array("msg"=>"删除失败","icon"=>5);
        }
        return json($return);
    }
}