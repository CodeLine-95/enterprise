<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:77:"/www/wwwroot/ccc.flv.pet/public/../application/admin/view/goods_cate/add.html";i:1581869600;s:65:"/www/wwwroot/ccc.flv.pet/application/admin/view/public/title.html";i:1581519893;}*/ ?>
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
.layui-form-select{
  width: 165px;
}
.layui-form-item .layui-input-inline{
  width: auto;
}
</style>
</head>
<body>
  <div class="layui-fluid">
    <div class="layui-row layui-col-space15">
      <div class="layui-col-md12">
        <div class="layui-card">
          <div class="layui-card-header">添加类型</div>
          <div class="layui-form layui-card-body" pad15>
            <div class="layui-form-item">
              <label class="layui-form-label" for="cate_name">名称</label>
              <div class="layui-input-block">
                <input type="text" name="cate_name" id="cate_name" lay-verify="required" class="layui-input">
              </div>
  			</div>
            <div class="layui-form-item">
              <label class="layui-form-label">区别</label>
              <div class="layui-input-block">
                <input type="radio" value="1" class="layui-input" title="国内汽车" checked name="cate_type">
                <input type="radio" value="2" class="layui-input" title="国外汽车" name="cate_type">
              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label" for="cate_sort">排序</label>
              <div class="layui-input-block">
                <input type="number" value="1" class="layui-input" name="cate_sort" id="cate_sort">
              </div>
            </div>
            <div class="layui-form-item">
              <div class="layui-input-block">
                  <label class="layui-form-label"><button class="layui-btn" lay-submit lay-filter="add">添加</button></label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    layui.use(['form'], function(){
      var form = layui.form;
      form.on('submit(add)', function(data){
        $.post('<?php echo url("GoodsCate/add"); ?>',data.field,function (res) {
          if (res.icon == 6){
            layer.msg(res.msg,{icon: res.icon,time:1000},function(){
              window.parent.location.reload();
            });
          } else {
            layer.msg(res.msg,{icon: res.icon,time:1000},function(){
              window.location.reload();
            });
          }
        },'json');
        return false;
      });
    });
  </script>
</body>
</html>
