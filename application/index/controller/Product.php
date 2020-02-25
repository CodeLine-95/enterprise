<?php
namespace app\index\controller;

use app\index\model\Orders;
use think\Controller;
use app\index\model\Product as Products;
use app\index\model\Cate as Cates;
use app\index\model\Comment as CommentModel;
use app\index\model\Users as UsersModel;

class Product extends Base
{
    public function index(){
        $params = request()->param();
        $where = [];
        if (isset($params['cid'])){
            $where['cid'] = $params['cid'];
        }
        $list = (new Products())->where($where)->paginate(2);
        $this->assign('list',$list);

        $china_cate = (new Cates())->where(['cate_type'=>1])->select();
        $_cate = (new Cates())->where(['cate_type'=>2])->select();
        $this->assign([
            'china_cate'  => $china_cate,
            '_cate'       => $_cate,
            'params'      => $params
        ]);
        return $this->fetch();
    }

    public function detail(){
        $id = input('id');
        $field = (new Products())->where(['id'=>$id])->find();
        $this->assign('field',$field);
        (new Products())->update(['view'=>$field['view']+1],['id'=>$id]);
        $china_cate = (new Cates())->where(['cate_type'=>1])->select();
        $_cate = (new Cates())->where(['cate_type'=>2])->select();
        $comment = (new CommentModel())->where(['product_id'=>$id])->paginate(10);
        $user = (new UsersModel())->where(['id'=>$this->user['uid']])->find();
        $this->assign([
            'china_cate'  => $china_cate,
            '_cate'       => $_cate,
            'comment'     => $comment,
            'user'        => $user
        ]);
        return $this->fetch();
    }

    public function buy_action(){
        if (request()->isPost()){
            $params = request()->post();
            $goods = (new Products())->where(['id'=>$params['id']])->find();
            $orders = [
                'orderID' => 'CA'.date('YmdHis').mt_rand(10,99999),
                'goodsID' => $params['id'],
                'goodsName'=>$goods['name'],
                'goodsCount'=>$params['num'],
                'userID' => $this->user['uid'],
                'userName'=>$this->user['username'],
                'create_t'=> time(),
                'deleteOrder'=>1,
                'status'=>1
            ];
            if ((new Orders())->save($orders)){
                return json(['msg'=>'ok','code'=>0]);
            }else{
                return json(['msg'=>'下单失败','code'=>-1]);
            }
        }else{
            return json(['msg'=>'请求错误','code'=>-1]);
        }
    }

    public function comment_action(){
      if (request()->isPost()) {
          $params = request()->post();
          $params['ip'] = Getip();
          $params['device'] = GetBrowser();
          $params['create_t'] = time();
          if ((new CommentModel())->save($params)){
              return json(['msg'   => '发表成功', 'icon'  => 6]);
          }else{
              return json(['msg'   => '发表失败', 'icon'  => 5]);
          }
      }else{
          return json(['msg'=>'请求错误','code'=>-1]);
      }
    }
}
