<?php
namespace app\admin\controller;
use app\admin\controller\base\Base;
use app\admin\model\GainVideo as GainVideoModel;
use app\admin\model\Expert as ExpertModel;
use app\admin\model\Gain as GainModel;

class GainVideo extends Base
{
    public function lists(){
        $get = request()->get();
        $where = [];
        if (isset($get['type'])){
            if (isset($get['name']) && !empty($get['name'])) {
                switch ($get['type']) {
                    case 1:
                        $where['v.name'] = ['like','%'.$get['name'].'%'];
                        break;
                }
            }
        }
        $list = (new GainVideoModel())
            ->alias('v')
            ->field(['v.*','g.name gain_name','e.name expert_name'])
            ->join('crm_gain g','v.gain_id = g.id')
            ->join('crm_expert e','v.expert_id = e.id')
            ->where($where)->paginate(10);
        $this->assign('list',$list);
        $get['type'] = isset($get['type']) ? $get['type'] : 1;
        $get['name'] = isset($get['name']) ? $get['name'] : '';
        $this->assign('get',$get);
        return $this->fetch();
    }

    public function add(){
        if (request()->isPost()){
            $params = request()->post();
            if ((new GainVideoModel())->save($params)){
                return json(['msg'   => '添加成功', 'icon'  => 6]);
            }else{
                return json(['msg'   => '添加失败', 'icon'  => 5]);
            }
        }else{
            $expert = (new ExpertModel())->select();
            $this->assign('expert',$expert);
            $gain = (new GainModel())->select();
            $this->assign('gain',$gain);
            return $this->fetch();
        }
    }

    public function edit(){
        if (request()->isPost()){
            $params = request()->post();
            if ((new GainVideoModel())->update($params)){
                return json(['msg'   => '编辑成功', 'icon'  => 6]);
            }else{
                return json(['msg'   => '编辑失败', 'icon'  => 5]);
            }
        }else{
            $id = input('id');
            $field = (new GainVideoModel())->where(['id'=>$id])->find();
            $this->assign('field',$field);
            $expert = (new ExpertModel())->select();
            $this->assign('expert',$expert);
            $gain = (new GainModel())->select();
            $this->assign('gain',$gain);
            return $this->fetch();
        }
    }

    public function del(){
        $id = json_decode(input('post.id'),true);
        if(GainVideoModel::destroy($id)){
            $return = array("msg"=>"删除成功","icon"=>6);
        }else{
            $return = array("msg"=>"删除失败","icon"=>5);
        }
        return json($return);
    }
}