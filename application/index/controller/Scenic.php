<?php
namespace app\index\controller;
use app\index\model\Scenic as Scenics;

class Scenic extends Base
{
    public function index(){
        $list = (new Scenics())->paginate(6);
        $this->assign('list',$list);
        return $this->fetch();
    }

    public function detail(){
        $id = input('id');
        $field = (new Scenics())->where(['id'=>$id])->find();
        $this->assign('field',$field);
        return $this->fetch();
    }

}