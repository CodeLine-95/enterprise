<?php
namespace app\index\controller;
use app\index\model\News as NewsModel;
class News extends Base
{
    public function index(){
        $list = (new NewsModel)->order(['create_t'=>'desc'])->paginate(10);
        $this->assign('list',$list);
        return $this->fetch();
    }

    public function detail(){
        $id = input('id');
        $field = (new NewsModel())->where(['id'=>$id])->find();
        $this->assign('field',$field);
        return $this->fetch();
    }
}