<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:75:"/www/wwwroot/ccc.flv.pet/public/../application/admin/view/admins/lists.html";i:1582272719;s:65:"/www/wwwroot/ccc.flv.pet/application/admin/view/public/title.html";i:1581519893;}*/ ?>
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
 </style>
</head>
<body>
<div class="layui-fluid" class="layui-form">
  <div class="layui-card">
    <div class="layui-tab layui-tab-brief">
      <crmblok>
          <div style="position: relative;">
            <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
            <button class="layui-btn layui-btn-normal" onclick="admin_show('添加','<?php echo url('admins/add'); ?>',600,400)"><i class="layui-icon">&#xe608;</i>添加</button>
            <form class="layui-form" method="get" style="display:inline-block;position: absolute;right: 0;">
              <div class="layui-input-inline">
                <select name="user_type">
                  <option value="1" <?php if($get['user_type'] == 1): ?>select<?php endif; ?>>账号</option>
                  <!-- <option value="2" <?php if($get['user_type'] == 2): ?>select<?php endif; ?>>昵称</option> -->
                </select>
              </div>
              <div class="layui-input-inline">
                <input type="text" name="user_name" value="<?php echo $get['user_name']; ?>" class="layui-input" style="background-color:#eee;border:none;">
              </div>
              <button class="layui-btn layui-btn-normal" type="submit"><i class="layui-icon layui-icon-search"></i>搜索</button>
            </form>
          </div>
        </crmblok>
        <table class="layui-table">
          <thead>
            <tr>
              <th width="25" align="center">
                <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
              </th>
              <th align="center" style="width:80px;">序号</th>
              <th align="center">用户名</th>
              <th align="center" style="width:60px;">账号状态</th>
              <th align="center" style="width:220px;">操作</th>
            </tr>
          </thead>
          <tbody>
          <?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?>
            <tr align="center" style="height:500px;"><td colspan="7">暂无用户</td></tr>
          <?php else: foreach($list as $l): ?>
              <tr>
                <td>
                  <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='<?php echo $l['id']; ?>'><i class="layui-icon">&#xe605;</i></div>
                </td>
                <td><?php echo $l['id']; ?></td>
                <td><?php echo $l['user_name']; ?></td>
                <td>
                  <?php if($l['user_status'] == 1): ?>
                    <span style="color:#8BC34A;">正常</span>
                  <?php else: ?>
                    <span style="color:#E51C23;">冻结</span>
                  <?php endif; ?>
                </td>
                <td>
                  <?php if($l['id'] != 1): ?>
                	<button class="layui-btn layui-btn-normal layui-btn-sm" onclick="admin_show('编辑员工信息','<?php echo url('admins/edit',['id'=>$l['id']]); ?>',600,400)">编辑</button>
                  <button class="layui-btn layui-btn-normal layui-btn-sm" onclick="del('<?php echo $l['id']; ?>')">删除</button>
                  <?php else: ?>
                  <button class="layui-btn layui-btn-normal layui-btn-sm layui-btn-disabled">编辑</button>
                  <button class="layui-btn layui-btn-normal layui-btn-sm layui-btn-disabled">删除</button>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; endif; ?>
          </tbody>
        </table>
    </div>
    </div>
  </div>
  <script>
  	function del(id)
  	{
  		layer.confirm("您确定删除该用户吗？",function(){
  			$.ajax({
  				url:"<?php echo url('admins/del'); ?>",
  				data:{id:id},
  				type:'post',
  				success:function(data)
  				{
  					var status = JSON.parse(data);
  					layer.msg(status.msg,{icon:status.icon,time:1000},function(){
  						window.location.reload();
  					});
  				}
  			});
  		});
  	}
    function delAll(){
      var datas = tableCheck.getData();
      layer.confirm("确认删除选择的用户吗？",function(){
        $.ajax({
          url:"<?php echo url('admins/del'); ?>",
          data:{id:JSON.stringify(datas)},
          type:'post',
          success:function(data){
            var status = JSON.parse(data);
            layer.msg(status.msg,{icon:status.icon,time:1000},function(){
              window.location.reload();
            });
          }
        });
      });
    }

    function admin_show(title,url,w,h){
      var index;
      if (title == null || title == '') {
        title=false;
      };
      if (url == null || url == '') {
        url="404.html";
      };
      if (w == null || w == '') {
        w=($(window).width()*0.9);
      };
      if (h == null || h == '') {
        h=($(window).height() - 50);
      };
      index = layer.open({
        type: 2,
        area: [w+'px', h +'px'],
        fix: false, //不固定
        title: title,
        content: url
      });
      //改变窗口大小时，重置弹窗的宽高，防止超出可视区域（如F12调出debug的操作）
      $(window).on("resize",function(){
        layui.layer.full(index);
      })
    }
  </script>
</body>
</html>
