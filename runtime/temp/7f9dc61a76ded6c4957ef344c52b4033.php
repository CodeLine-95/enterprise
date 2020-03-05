<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:80:"/Applications/MAMP/htdocs/bbbbbb/public/../application/admin/view/news/edit.html";i:1583417319;s:73:"/Applications/MAMP/htdocs/bbbbbb/application/admin/view/public/title.html";i:1581519893;}*/ ?>
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
        <div class="layui-card-header">编辑新闻</div>
        <div class="layui-form layui-card-body" pad15>
          <input type="hidden" name="id" value="<?php echo $field['id']; ?>">
          <div class="layui-form-item">
            <label class="layui-form-label" for="title">标题</label>
            <div class="layui-input-block">
              <input type="text" name="title" value="<?php echo $field['title']; ?>" id="title" lay-verify="required" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label" for="cate_id">栏目</label>
            <div class="layui-input-block">
              <select name="cate_id" id="cate_id">
                <?php foreach($cate as $c): ?>
                <option value="<?php echo $c['id']; ?>" <?php if($field['cate_id'] == $c['id']): ?>selected<?php endif; ?>><?php echo $c['name']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label" for="keywords">关键词</label>
            <div class="layui-input-block">
              <input type="text" name="keywords" value="<?php echo $field['keywords']; ?>" id="keywords" placeholder="以逗号分隔" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label" for="pic">缩略图</label>
            <div class="layui-input-block">
              <button type="button" style="float:left;margin-right:1%;" id="pic" class="layui-btn"><i class="layui-icon">&#xe67c;</i>上传</button>
              <input type="text" value="<?php echo $field['pic']; ?>" style="width:53%;float:left;display:none;background-color:#dcdcdc;" readonly name="pic" class="layui-input">
              <?php if(empty($field['pic'])): ?>
              <div id="pic_img" style="margin-top: 10px;">

              </div>
              <?php else: ?>
              <div id="pic_img" style="margin-top: 10px;">
                <img src="<?php echo $field['pic']; ?>" style="height: 200px;" alt="">
              </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label" for="desc">简介</label>
            <div class="layui-input-block">
              <textarea name="desc" id="desc" class="layui-textarea"><?php echo $field['desc']; ?></textarea>
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label" for="content">内容</label>
            <div class="layui-input-block">
              <textarea name="content" id="content" style="display: none;"><?php echo $field['content']; ?></textarea>
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">推荐</label>
            <div class="layui-input-inline">
              <input type="radio" name="is_recommend" title="推荐" value="1" <?php if($field['is_recommend'] == 1): ?>checked<?php endif; ?> class="layui-input">
              <input type="radio" name="is_recommend" title="未推荐" value="0" <?php if($field['is_recommend'] == 0): ?>checked<?php endif; ?> class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">显示</label>
            <div class="layui-input-inline">
              <input type="radio" name="status" title="发布" value="1" <?php if($field['status'] == 1): ?>checked<?php endif; ?> class="layui-input">
              <input type="radio" name="status" title="未发布" value="0" <?php if($field['status'] == 0): ?>checked<?php endif; ?> class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <div class="layui-input-block">
              <label class="layui-form-label"><button class="layui-btn" lay-submit lay-filter="add">编辑</button></label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  layui.use(['form','upload','laydate','layedit'], function(){
    var form = layui.form,upload = layui.upload,laydate = layui.laydate,layedit = layui.layedit;
    //多图上传实例
    upload.render({
      elem: '#pic',
      url: '<?php echo url("AjaxAction/upload"); ?>',
      accept:"images",
      acceptMime: 'image/*',
      exts:"jpg|png|gif|bmp|jpeg",
      auto:true,
      size:<?php echo $conf['maxfile']; ?>,
      drag:false,
      before: function(obj) {
        layer.msg('上传中...', {icon: 16,shade: 0.01,time: 0})
      },
      done: function(res) {
        layer.close(layer.msg('上传成功！'));
        $('input[name=pic]').val(res.data);
        $('#pic_img').html('<img style="width: 100%;" src="'+res.data+'" />');
      }
      ,error: function(){
        layer.msg('上传错误！');
      }
    });
    var index = layedit.build('content', {
      tool: [
        'strong' //加粗
        ,'italic' //斜体
        ,'underline' //下划线
        ,'del' //删除线
        ,'|' //分割线
        ,'left' //左对齐
        ,'center' //居中对齐
        ,'right' //右对齐
        ,'link' //超链接
        ,'unlink' //清除链接
        ,'face' //表情
        ,'help' //帮助
      ]
    });
    form.on('submit(add)', function(data){
      data.field.content = layedit.getContent(index);
      $.post('<?php echo url("news/edit"); ?>',data.field,function (res) {
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
