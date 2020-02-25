<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:85:"/Applications/MAMP/htdocs/bbbbbb/public/../application/admin/view/enterprise/add.html";i:1582637169;s:73:"/Applications/MAMP/htdocs/bbbbbb/application/admin/view/public/title.html";i:1581519893;}*/ ?>
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
          <div class="layui-card-header">添加企业</div>
          <div class="layui-form layui-card-body" pad15>
            <div class="layui-form-item">
              <label class="layui-form-label" for="name">企业名称</label>
              <div class="layui-input-block">
                <input type="text" name="name" id="name" lay-verify="required" class="layui-input">
              </div>
  			</div>
            <div class="layui-form-item">
              <label class="layui-form-label" for="desc">简介</label>
              <div class="layui-input-block">
                <textarea name="desc" id="desc" class="layui-textarea"></textarea>
              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label" for="address">企业地址</label>
              <div class="layui-input-block">
                <input type="text" name="address" id="address" class="layui-input">
              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label" for="tel_name">联系人</label>
              <div class="layui-input-block">
                <input type="text" name="tel_name" id="tel_name" class="layui-input">
              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label" for="tel">联系方式</label>
              <div class="layui-input-block">
                <input type="text" name="tel" id="tel" class="layui-input">
              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label" for="corporation">企业法人</label>
              <div class="layui-input-block">
                <input type="text" name="corporation" id="corporation" class="layui-input">
              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">签约状态</label>
              <div class="layui-input-inline">
                <input type="radio" name="status" title="合作中" value="1" checked class="layui-input">
                <input type="radio" name="status" title="已解约" value="0" class="layui-input">
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
    layui.use(['form','upload','laydate','layedit'], function(){
      var form = layui.form;
      form.on('submit(add)', function(data){
        $.post('<?php echo url("enterprise/add"); ?>',data.field,function (res) {
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
