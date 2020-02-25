<?php

namespace app\index\controller;
use app\index\model\News;
class Index extends Base{
    public function index(){
        $news = (new News)->order(['create_t'=>'desc'])->limit(4)->select();
        $this->assign([
            'news' => $news
        ]);
        return $this->fetch();
    }
}