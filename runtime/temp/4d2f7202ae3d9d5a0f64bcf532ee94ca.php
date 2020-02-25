<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"/www/wwwroot/ccc.flv.pet/public/../application/admin/view/conf/index.html";i:1582095606;s:65:"/www/wwwroot/ccc.flv.pet/application/admin/view/public/title.html";i:1581519893;}*/ ?>
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

</head>
<body>
  <div class="layui-fluid">
    <div class="layui-row layui-col-space15">
      <div class="layui-col-md12">
        <div class="layui-card">
          <div class="layui-card-header">系统设置</div>
          <div class="layui-card-body" pad15>

            <div class="layui-form" wid100 lay-filter="">
              <div class="layui-form-item">
                <label class="layui-form-label">系统名称</label>
                <div class="layui-input-block">
                  <input type="text" name="title" value="<?php echo $system['title']; ?>" class="layui-input">
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">最大文件上传</label>
                <div class="layui-input-inline" style="width: 80px;">
                  <input type="text" name="maxfile" lay-verify="number" value="<?php echo $system['maxfile']; ?>" class="layui-input">
                </div>
                <div class="layui-input-inline layui-input-company">KB</div>
                <div class="layui-form-mid layui-word-aux">提示：1 M = 1024 KB</div>
              </div>
              <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">版权信息</label>
                <div class="layui-input-block">
                  <textarea name="copy" class="layui-textarea" style="resize: none;"><?php echo $system['copy']; ?></textarea>
                </div>
              </div>
              <div class="layui-form-item">
                <label class="layui-form-label">用户默认密码</label>
                <div class="layui-input-block">
                  <input type="text" name="pwd" value="<?php echo $system['pwd']; ?>" class="layui-input">
                </div>
              </div>
              <div class="layui-form-item">
                <div class="layui-input-block">
                  <button class="layui-btn" lay-submit lay-filter="set_website">确认保存</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    layui.use(['form','element'], function(){
      var form = layui.form;
      element = layui.element;
      console.log(element)
      form.on('submit(set_website)', function(data){
          $.ajax({
              type:'POST',
              url:'<?php echo url("conf/index"); ?>',
              data: {
                  data:JSON.stringify(data.field)
              },
              success:function (data) {
                  var status = JSON.parse(data);
                  if (status.icon == 6){
                      layer.msg(status.msg,{icon: status.icon,time:1000},function(){
                          window.location.reload();
                      });
                  } else {
                      layer.msg(status.msg,{icon: status.icon,time:1000},function(){
                          window.location.reload();
                      });
                  }
              }
          });
        return false;
      });
    });
  </script>
</body>
</html>
