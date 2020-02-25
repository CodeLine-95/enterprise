<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:75:"/www/wwwroot/ccc.flv.pet/public/../application/admin/view/orders/lists.html";i:1582124146;s:65:"/www/wwwroot/ccc.flv.pet/application/admin/view/public/title.html";i:1581519893;}*/ ?>
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
      <crmblok>
          <div style="position: relative;height: 38px;">
<!--            <button class="layui-btn layui-btn-danger" onclick="delAll()"></button>-->
<!--            <button class="layui-btn layui-btn-normal" onclick="crm_admin_show('添加','<?php echo url('/add'); ?>')"><i class="layui-icon">&#xe608;</i>添加</button>-->
            <form class="layui-form" method="get" style="display:inline-block;position: absolute;right: 0;">
              <div class="layui-input-inline">
                <select name="type">
                  <option value="1" <?php if($get['type'] == 1): ?>select<?php endif; ?>>订单号</option>
<!--                  <option value="2">昵称</option>-->
                </select>
              </div>
              <div class="layui-input-inline">
                <input type="text" name="name" value="<?php echo $get['name']; ?>" class="layui-input" style="background-color:#eee;border:none;">
              </div>
              <button class="layui-btn layui-btn-normal" type="submit"><i class="layui-icon layui-icon-search"></i>搜索</button>
            </form>
          </div>
      </crmblok>
      <table class="layui-table">
          <thead>
            <tr>
<!--              <th width="25" align="center">-->
<!--                <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>-->
<!--              </th>-->
              <th align="center" style="width:80px;">序号</th>
              <th align="center">订单号</th>
              <th align="center">商品编号</th>
              <th align="center">商品名称</th>
              <th align="center">商品数量</th>
              <th align="center">购买用户</th>
              <th align="center">购买时间</th>
              <th align="center">订单状态</th>
              <th align="center">操作</th>
            </tr>
          </thead>
          <tbody>
          <?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?>
            <tr align="center" style="height:500px;"><td colspan="10">暂无导游</td></tr>
          <?php else: foreach($list as $l): ?>
              <tr>
                <td><?php echo $l['id']; ?></td>
                <td><?php echo $l['orderID']; ?></td>
                <td><?php echo $l['goodsID']; ?></td>
                <td><?php echo $l['goodsName']; ?></td>
                <td><?php echo $l['goodsCount']; ?></td>
                <td><?php echo $l['userName']; ?></td>
                <td><?php echo date('Y-m-d H:i:s'); ?></td>
                <td>
                  <?php switch($l['status']): case "1": ?><span class="layui-btn layui-btn-normal layui-btn-xs">已付款</span><?php break; case "2": ?><span class="layui-btn layui-btn-normal layui-btn-xs">已发货</span><?php break; endswitch; ?>
                </td>
                <td>
                  <?php if($l['status'] == 1): ?>
                  <button class="layui-btn layui-btn-normal layui-btn-sm" onclick="send('<?php echo $l['id']; ?>')">发货</button>
                  <?php endif; ?>
                	 <button class="layui-btn layui-btn-normal layui-btn-sm" onclick="crm_admin_show('查看','<?php echo url('orders/show',['id'=>$l['id']]); ?>')">查看</button>
                   <button class="layui-btn layui-btn-normal layui-btn-sm layui-btn-danger" onclick="del('<?php echo $l['id']; ?>')">删除</button>
                </td>
              </tr>
            <?php endforeach; endif; ?>
          </tbody>
        </table>
      <div style="text-align: center">
        <div class="laypage-main">
          <?php echo $list->render(); ?>
        </div>
      </div>
    </div>
    </div>
  </div>
  <script>
    function send(id){
      layer.confirm("您确定要发货该订单吗？",function(){
  		  $.post("<?php echo url('orders/send'); ?>",{id:id},function (res) {
            layer.msg(res.msg,{icon:res.icon,time:1000},function(){
              window.location.reload();
            });
          },'json');
  		});
    }
  	function del(id){
  		layer.confirm("您确定删除该订单吗？",function(){
  		  $.post("<?php echo url('orders/del'); ?>",{id:id},function (res) {
            layer.msg(res.msg,{icon:res.icon,time:1000},function(){
              window.location.reload();
            });
          },'json');
  		});
  	}
  </script>
</body>
</html>
