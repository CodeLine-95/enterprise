<?php
namespace app\admin\controller;

use app\admin\controller\base\Base;
use app\admin\model\News as NewsModel;

class News extends Base
{
    public function lists(){
        $get = request()->get();
        $where = [];
        if (isset($get['type'])){
            if (isset($get['name']) && !empty($get['name'])) {
                switch ($get['type']) {
                    case 1:
                        $where['title'] = ['like','%'.$get['name'].'%'];
                        break;
                }
            }
        }
        $list = (new NewsModel())
            ->alias('n')
            ->field(['n.*','u.user_name'])
            ->join('crm_users u','n.uid = u.id')
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
            $params['uid'] = $this->user['uid'];
            $params['create_t'] = time();
            $params['update_t'] = time();
            if ((new NewsModel())->save($params)){
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
            if ((new NewsModel())->update($params)){
                return json(['msg'   => '编辑成功', 'icon'  => 6]);
            }else{
                return json(['msg'   => '编辑失败', 'icon'  => 5]);
            }
        }else{
            $id = input('id');
            $field = (new NewsModel())->where(['id'=>$id])->find();
            $this->assign('field',$field);
            return $this->fetch();
        }
    }

    public function del(){
        $id = json_decode(input('post.id'),true);
        if(NewsModel::destroy($id)){
            $return = array("msg"=>"删除成功","icon"=>6);
        }else{
            $return = array("msg"=>"删除失败","icon"=>5);
        }
        return json($return);
    }
}
