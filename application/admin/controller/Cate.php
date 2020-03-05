<?php
namespace app\admin\controller;

use app\admin\controller\base\Base;
use app\admin\model\Cate as CateModel;

class Cate extends Base{
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
        $list = (new CateModel())->where($where)->paginate(10);
        $this->assign('list',$list);
        $get['type'] = isset($get['type']) ? $get['type'] : 1;
        $get['name'] = isset($get['name']) ? $get['name'] : '';
        $this->assign('get',$get);
        return $this->fetch();
    }

    public function add(){
        if (request()->isPost()){
            $params = request()->post();
            if ((new CateModel())->save($params)){
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
            if ((new CateModel())->update($params)){
                return json(['msg'   => '编辑成功', 'icon'  => 6]);
            }else{
                return json(['msg'   => '编辑失败', 'icon'  => 5]);
            }
        }else{
            $id = input('id');
            $field = (new CateModel())->where(['id'=>$id])->find();
            $this->assign('field',$field);
            return $this->fetch();
        }
    }

    public function del(){
        $id = json_decode(input('post.id'),true);
        if(CateModel::destroy($id)){
            $return = array("msg"=>"删除成功","icon"=>6);
        }else{
            $return = array("msg"=>"删除失败","icon"=>5);
        }
        return json($return);
    }
}