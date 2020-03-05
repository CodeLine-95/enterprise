<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:86:"/Applications/MAMP/htdocs/bbbbbb/public/../application/admin/view/gain_video/edit.html";i:1582640443;s:73:"/Applications/MAMP/htdocs/bbbbbb/application/admin/view/public/title.html";i:1581519893;}*/ ?>
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
        <div class="layui-card-header">编辑成果视频</div>
        <div class="layui-form layui-card-body" pad15>
          <input type="hidden" name="id" value="<?php echo $field['id']; ?>">
          <div class="layui-form-item">
            <label class="layui-form-label" for="name">视频名称</label>
            <div class="layui-input-block">
              <input type="text" name="name" value="<?php echo $field['name']; ?>" id="name" lay-verify="required" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label" for="gain_id">成果名称</label>
            <div class="layui-input-block">
              <select name="gain_id" id="gain_id">
                <?php foreach($gain as $g): ?>
                <option value="<?php echo $g['id']; ?>" <?php if($field['gain_id'] == $g['id']): ?>selected<?php endif; ?>><?php echo $g['name']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label" for="expert_id">专家名称</label>
            <div class="layui-input-block">
              <select name="expert_id" id="expert_id">
                <?php foreach($expert as $e): ?>
                <option value="<?php echo $e['id']; ?>" <?php if($field['expert_id'] == $g['id']): ?>selected<?php endif; ?>><?php echo $e['name']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label" for="video">视频地址</label>
            <div class="layui-input-block">
              <button type="button" style="margin-bottom:1%;" id="video" class="layui-btn"><i class="layui-icon">&#xe67c;</i>上传</button>
              <?php if(empty($field['video'])): ?>
              <div id="Videos" style="display: none;">
              </div>
              <?php else: ?>
              <div id="Videos" style="display: block;">
                <div style="margin-left: 10px;">
                  <div style="margin-bottom: 10px;">
                    <input type="hidden" name="video" value="<?php echo $field['video']; ?>">
                    <video src="<?php echo $field['video']; ?>" style="width: 200px;" controls="controls"></video>
                  </div>
                </div>
              </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="layui-form-item videoProgress" style="display:none;">
            <label for="Video" class="layui-form-label"></label>
            <div class="layui-input-block" style="width:200px;">
              <div class="layui-progress" lay-filter="videoProgress" lay-showPercent="true">
                <div class="layui-progress-bar" lay-percent="0%"></div>
              </div>
            </div>
          </div>

          <div class="layui-form-item">
            <div class="layui-input-block">
              <label class="layui-form-label"><button class="layui-btn" lay-submit lay-filter="edit">编辑</button></label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  layui.use(['form','upload','laydate','layedit'], function(){
    var form = layui.form,upload = layui.upload;
    upload.render({
      elem: '#video',
      url: '<?php echo url("AjaxAction/upload"); ?>',
      accept: 'video',
      size:<?php echo $conf['maxfile']; ?>,
      choose:function(obj){
        element.progress('videoProgress', 0);
      },
      progress: function(n, elem){
        $('.videoProgress').show();
        var percent = n + '%' //获取进度百分比
        element.progress('videoProgress', percent); //可配合 layui 进度条元素使用
      },
      done: function (res) {
        //如果上传失败
        if (res.status == 1) {
          $('#Videos').append('<div style="margin-left: 10px;"><div style="margin-bottom: 10px;"><input type="hidden" name="video" value="'+res.data+'"><video src="' + res.data + '" style="width: 200px;" controls="controls"></video></div></div>');
          $('#Videos').show();
          return layer.msg("上传成功");
        }else{
          return layer.msg('上传失败');
        }
      }
    });
    form.on('submit(edit)', function(data){
      $.post('<?php echo url("gainVideo/edit"); ?>',data.field,function (res) {
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
