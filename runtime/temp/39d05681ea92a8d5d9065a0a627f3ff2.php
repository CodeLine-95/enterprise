<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:74:"/www/wwwroot/ccc.flv.pet/public/../application/admin/view/product/add.html";i:1582095850;s:65:"/www/wwwroot/ccc.flv.pet/application/admin/view/public/title.html";i:1581519893;}*/ ?>
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
          <div class="layui-card-header">添加商品</div>
          <div class="layui-form layui-card-body" pad15>
            <div class="layui-form-item">
              <label class="layui-form-label" for="name">名称</label>
              <div class="layui-input-block">
                <input type="text" name="name" id="name" lay-verify="required" class="layui-input">
              </div>
  			</div>
            <div class="layui-form-item">
              <label class="layui-form-label">类别</label>
              <div class="layui-input-inline">
                <?php foreach($cate as $c): ?>
                <input type="radio" name="cid" title="<?php echo $c['cate_name']; ?>" value="<?php echo $c['id']; ?>" checked class="layui-input">
                <?php endforeach; ?>
              </div>
            </div>
<!--            <div class="layui-form-item">-->
<!--              <label class="layui-form-label" for="stock">价格</label>-->
<!--              <div class="layui-input-block">-->
<!--                <input type="text" step="0.00" value="0.00" name="price" class="layui-input" id="price">-->
<!--              </div>-->
<!--            </div>-->
            <div class="layui-form-item">
              <label class="layui-form-label" for="pic">封面</label>
              <div class="layui-input-block">
                <button type="button" style="float:left;margin-right:1%;" id="pic" class="layui-btn"><i class="layui-icon">&#xe67c;</i>上传</button>
                <input type="text" style="width:53%;float:left;display:none;background-color:#dcdcdc;" readonly name="pic" class="layui-input">
                <div id="pic_img" style="margin-top: 10px;">

                </div>
              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">类型</label>
              <div class="layui-input-inline">
                <input type="radio" name="type" title="汽车" value="1" checked class="layui-input">
                <input type="radio" name="type" title="导游" value="2" class="layui-input">
                <input type="radio" name="type" title="景点" value="3" class="layui-input">
              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label" for="desc">介绍</label>
              <div class="layui-input-block">
                <textarea name="desc" id="desc" class="layui-textarea"></textarea>
              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label" for="stock">库存</label>
              <div class="layui-input-block">
                <input type="number" value="1" class="layui-input" name="stock" id="stock">
              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">显示</label>
              <div class="layui-input-inline">
                <input type="radio" name="shelf" title="上架" value="1" checked class="layui-input">
                <input type="radio" name="shelf" title="下架" value="0" class="layui-input">
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
    layui.use(['form','upload','laydate'], function(){
      var form = layui.form,upload = layui.upload,laydate = layui.laydate;
      //时间
      laydate.render({
        elem: '#user_birthday' //指定元素
      });
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
            // $('input[name=user_face]').css({'display':'block'});
            $('#pic_img').html('<img src="'+res.data+'" />');
        }
        ,error: function(){
            layer.msg('上传错误！');
        }
      });
      form.on('submit(add)', function(data){
        $.post('<?php echo url("product/add"); ?>',data.field,function (res) {
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
