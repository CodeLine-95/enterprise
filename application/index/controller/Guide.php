<?php
namespace app\index\controller;
use app\index\model\Guide as GuideModel;
class Guide extends Base
{
    public function index(){
        $list = (new GuideModel())->paginate(2);
        $this->assign('list',$list);
        return $this->fetch();
    }

    public function detail(){
        $id = input('id');
        $field = (new GuideModel())->where(['id'=>$id])->find();
        $this->assign('field',$field);
        return $this->fetch();
    }
}