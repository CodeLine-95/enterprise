<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:82:"/Applications/MAMP/htdocs/bbbbbb/public/../application/admin/view/power/index.html";i:1566482652;s:73:"/Applications/MAMP/htdocs/bbbbbb/application/admin/view/public/title.html";i:1581519893;}*/ ?>
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
 </style>
</head>
<body>
<div class="layui-fluid" class="layui-form">
  <div class="layui-card">
    <div class="layui-tab layui-tab-brief">
        <crmblok>
          <button class="layui-btn layui-btn-normal" onclick="crm_admin_show('添加角色','<?php echo url('power/add'); ?>')"><i class="layui-icon">&#xe608;</i>添加角色</button>
        </crmblok>
        <table class="layui-table" >
          <thead>
            <tr>
              <th width="50" align="center">ID</th>
              <th width="120" align="center">角色名称</th>
              <th align="center">权限说明</th>
              <th width="60" align="center">状态</th>
              <th width="100" align="center">操作</th>
            </tr>
          </thead>
          <tbody>
          <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?>
            <tr>
              <td><?php echo $vv['id']; ?></td>
              <td><?php echo $vv['title']; ?></td>
              <td><?php echo $vv['remark']; ?></td>
              <td>
                <?php switch($vv['status']): case "1": ?><button class="layui-btn layui-btn-normal layui-btn-xs">正常</button><?php break; default: ?><button class="layui-btn layui-btn-danger layui-btn-xs">停用</button>
                <?php endswitch; ?>
              </td>
              <td>
                <?php if($vv['id'] == 1): ?>
                  <button class="layui-btn layui-btn-normal layui-btn-sm layui-btn-disabled"><i class="layui-icon"></i></button>
                  <button class="layui-btn layui-btn-normal layui-btn-sm layui-btn-disabled"><i class="layui-icon"></i></button>
                <?php else: ?>
                  <button class="layui-btn layui-btn-normal layui-btn-sm" onclick="crm_admin_show('编辑角色','<?php echo url('power/edit',array('id'=>$vv['id'])); ?>')"><i class="layui-icon"></i></button>
                  <button class="layui-btn layui-btn-normal layui-btn-sm" onclick="del(<?php echo $vv['id']; ?>)"><i class="layui-icon"></i></button>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; endif; else: echo "" ;endif; ?>
          </tbody>
        </table>
        <script type="text/javascript">
          function del(id){
            layer.confirm('确认要删除吗？',function(){
              $.get("<?php echo url('power/del'); ?>?id="+id,function(data){
                var message = JSON.parse(data);
                if (message.icon == 6){
                    layer.msg(message.msg,{icon: message.icon,time:1000},function () {
                        location.href=location.href
                   });
                } else {
                    layer.msg(message.msg,{icon: message.icon,time:1000});
                }
              })
            })
          }
        </script>
    </div>
    </div>
  </div>
</body>
</html>
