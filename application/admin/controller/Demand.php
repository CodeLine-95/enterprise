<?php
namespace app\admin\controller;
use app\admin\controller\base\Base;
use app\admin\model\Admin;
use app\admin\model\Demand as DemandModel;

class Demand extends Base
{
    public function lists(){
        $get = request()->get();
        $where = [];
        if (isset($get['type'])){
            if (isset($get['name']) && !empty($get['name'])) {
                switch ($get['type']) {
                    case 1:
                        $where['v.title'] = ['like','%'.$get['name'].'%'];
                        break;
                }
            }
        }
        $list = (new DemandModel())
            ->alias('v')
            ->field(['v.*','a.user_name u_name','d.user_name e_name'])
            ->join('crm_admin a','v.uid = a.id')
            ->join('crm_admin d','v.eid = d.id')
            ->where($where)->paginate(10);
        foreach ($list as $k=>$l){
            $audit = (new Admin())->where(['id'=>$l['audit_id']])->find();
            $list[$k]['a_name'] = $audit['user_name'];
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
            $params['create_t'] = time();
            if ((new DemandModel())->save($params)){
                return json(['msg'   => '添加成功', 'icon'  => 6]);
            }else{
                return json(['msg'   => '添加失败', 'icon'  => 5]);
            }
        }else{
            $admin = (new Admin())->where('user_name','neq','admin')->where('id','neq',$this->user['uid'])->select();
            $this->assign('admin',$admin);
            return $this->fetch();
        }
    }

    public function edit(){
        if (request()->isPost()){
            $params = request()->post();
            if ((new DemandModel())->update($params)){
                return json(['msg'   => '编辑成功', 'icon'  => 6]);
            }else{
                return json(['msg'   => '编辑失败', 'icon'  => 5]);
            }
        }else{
            $id = input('id');
            $field = (new DemandModel())->where(['id'=>$id])->find();
            $this->assign('field',$field);
            $admin = (new Admin())->where('user_name','neq','admin')->where('id','neq',$this->user['uid'])->select();
            $this->assign('admin',$admin);
            return $this->fetch();
        }
    }

    public function del(){
        $id = json_decode(input('post.id'),true);
        if(DemandModel::destroy($id)){
            $return = array("msg"=>"删除成功","icon"=>6);
        }else{
            $return = array("msg"=>"删除失败","icon"=>5);
        }
        return json($return);
    }

    public function audit_state(){
        if (request()->isPost()){
            $params = request()->post();
            if ((new DemandModel())->update($params)){
                return json(['msg'   => '审核成功', 'icon'  => 6]);
            }else{
                return json(['msg'   => '审核失败', 'icon'  => 5]);
            }
        }else {
            $id = input('id');
            $field = (new DemandModel())->where(['id' => $id])->find();
            $this->assign('field', $field);
            return $this->fetch();
        }
    }
}