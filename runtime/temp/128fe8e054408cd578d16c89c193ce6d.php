<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:74:"/www/wwwroot/ccc.flv.pet/public/../application/admin/view/orders/show.html";i:1581871017;s:65:"/www/wwwroot/ccc.flv.pet/application/admin/view/public/title.html";i:1581519893;}*/ ?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
<title><?php echo $system['title']; ?></title>
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="stylesheet" href="/static/layuiadmin/layui/css/layui.css" media="all">
<link rel="stylesheet" href="/static/layuiadmin/style/admin.css" media="all">
<script src="/static/admin/js/jquery.min.js"></script>
<script src="/static/layuiadmin/layui/layui.js"></script>
<script src="/static/admin/js/admin.js"></script>
<style media="screen">
  .layui-form-checked[lay-skin="primary"] i{
    border-color:#1E9FFF;
    background-color:#1E9FFF;
    color:#fff;
  }
  .layui-form-checkbox[lay-skin="primary"]:hover i {
    border-color:#1E9FFF;
    color:#fff;
  }
  .layui-form-radio > i:hover, .layui-form-radioed > i {
      color: #1E9FFF;
  }
  .laypage-main {
      margin: 20px 0;
      border: 1px solid #1E9FFF;
      border-right: none;
      border-bottom: none;
      font-size: 0;
  }
  .laypage-main * {
      padding: 0 15px;
      line-height: 36px;
      border-right: 1px solid #1E9FFF;
      border-bottom: 1px solid #1E9FFF;
      font-size: 14px;
  }
  .laypage-main, .laypage-main * {
      display: inline-block;
      *display: inline;
      *zoom: 1;
      vertical-align: top;
  }
  .laypage-main .laypage-curr {
      background-color: #1E9FFF;
      color: #fff;
  }
</style>

 <style media="screen">
   .layui-table tbody tr:hover{
     background-color: #fff;
   }
   .layui-form-select{
    width: 100px;
   }
   .layui-form-select dl dd.layui-this {
     background-color: #1E9FFF;
     color: #fff;
   }
 </style>
</head>
<body>
<div class="layui-fluid" class="layui-form">
    <div class="layui-card">
    <div class="layui-tab layui-tab-brief">
      <table class="layui-table">
          <tr>
            <td>订单号</td>
            <td><?php echo $field['orderID']; ?></td>
            <td>创建时间</td>
            <td><?php echo date('Y-m-d H:i:s',$field['create_t']); ?></td>
            <td>订单状态</td>
            <td>
              <?php switch($field['status']): case "1": ?><span class="layui-btn layui-btn-normal layui-btn-xs">已付款</span><?php break; case "2": ?><span class="layui-btn layui-btn-normal layui-btn-xs">已发货</span><?php break; endswitch; ?>
            </td>
          </tr>
      </table>
    </div>
  </div>
    <div class="layui-card">
        <div class="layui-tab layui-tab-brief">
            <table class="layui-table">
                <tr>
                    <td>商品编号</td>
                    <td><?php echo $goods['id']; ?></td>
                    <td>商品名称</td>
                    <td><?php echo $goods['name']; ?></td>
                    <td>商品图片</td>
                    <td><img src="<?php echo $goods['pic']; ?>" alt=""></td>
                    <td>商品分类</td>
                    <td><?php echo $goods['cate_name']; ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="layui-card">
        <div class="layui-tab layui-tab-brief">
            <table class="layui-table">
                <tr>
                    <td>用户名</td>
                    <td><?php echo $users['user_name']; ?></td>
                    <td>用户头像</td>
                    <td><img src="<?php echo $users['user_face']; ?>" alt=""></td>
                    <td>用户昵称</td>
                    <td><?php echo $users['user_nick']; ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
</body>
</html>
