<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:81:"/Applications/MAMP/htdocs/bbbbbb/public/../application/admin/view/users/edit.html";i:1582095837;s:73:"/Applications/MAMP/htdocs/bbbbbb/application/admin/view/public/title.html";i:1581519893;}*/ ?>
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
          <div class="layui-card-header">编辑账号</div>
          <div class="layui-form layui-card-body" pad15>
            <input type="hidden" name="id" value="<?php echo $field['id']; ?>">
            <div class="layui-form-item">
              <label class="layui-form-label" for="user_name">账号</label>
              <div class="layui-input-block">
                <input type="text" name="user_name" value="<?php echo $field['user_name']; ?>" id="user_name" lay-verify="required" class="layui-input">
              </div>
  			</div>
            <div class="layui-form-item">
              <label class="layui-form-label" for="user_nick">昵称</label>
              <div class="layui-input-block">
                <input type="text" name="user_nick" value="<?php echo $field['user_nick']; ?>" id="user_nick" class="layui-input">
              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label" for="user_face">头像</label>
              <div class="layui-input-block">
                <button type="button" style="float:left;margin-right:1%;" id="user_face" class="layui-btn"><i class="layui-icon">&#xe67c;</i>上传头像</button>
                <?php if(empty($field['user_face'])): ?>
                <input type="text" style="width:53%;float:left;display:none;background-color:#dcdcdc;" readonly name="user_face" class="layui-input">
                <?php else: ?>
                <input type="text" value="<?php echo $field['user_face']; ?>" style="width:53%;float:left;display:block;background-color:#dcdcdc;" readonly name="user_face" class="layui-input">
                <?php endif; ?>
              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">性别</label>
              <div class="layui-input-inline">
                <input type="radio" name="user_sex" title="男" value="0" <?php if($field['user_sex'] == 0): ?>checked<?php endif; ?> class="layui-input">
                <input type="radio" name="user_sex" title="女" value="1" <?php if($field['user_sex'] == 1): ?>checked<?php endif; ?> class="layui-input">
                <input type="radio" name="user_sex" title="保密" value="2" <?php if($field['user_sex'] == 2): ?>checked<?php endif; ?> class="layui-input">
              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label" for="user_email">邮箱</label>
              <div class="layui-input-block">
                <input type="email" name="user_email" value="<?php echo $field['user_email']; ?>" id="user_email" class="layui-input">
              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label" for="city-picker">城市</label>
              <div class="layui-input-block">
                <input type="text" autocomplete="on" value="<?php echo $field['user_city']; ?>" class="layui-input" id="city-picker" name="user_city" readonly="readonly" data-toggle="city-picker" placeholder="请选择">
              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label"></label>
              <div class="layui-input-block">
                <input type="text" autocomplete="on" value="<?php echo $field['user_city1']; ?>" class="layui-input" name="user_city1" placeholder="请输入详细地址">
              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label" for="user_sign">签名</label>
              <div class="layui-input-block">
                <textarea name="user_sign" id="user_sign" class="layui-textarea"><?php echo $field['user_sign']; ?></textarea>
              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label" for="user_birthday">生日</label>
              <div class="layui-input-block">
                <input type="text" class="layui-input" value="<?php echo $field['user_birthday']; ?>" name="user_birthday" id="user_birthday">
              </div>
            </div>
            <div class="layui-form-item">
              <label class="layui-form-label">状态</label>
              <div class="layui-input-inline">
                <input type="radio" name="user_status" title="正常" value="1" <?php if($field['user_status'] == 1): ?>checked<?php endif; ?> class="layui-input">
                <input type="radio" name="user_status" title="封禁" value="0" <?php if($field['user_status'] == 0): ?>checked<?php endif; ?> class="layui-input">
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
  <script src="/static/layuiadmin/layui_exts/city-picker/city-picker.data.js"></script>
  <link href="/static/layuiadmin/layui_exts/city-picker/city-picker.css" rel="stylesheet" />
  <script>
    layui.config({
      base: '/static/layuiadmin/layui_exts/' //静态资源所在路径
    }).extend({
      citypicker: 'city-picker/city-picker' // {/}的意思即代表采用自有路径，即不跟随 base 路径
    }).use(['citypicker'], function() {
      var $ = layui.$, cityPicker = layui.citypicker;
      var currentPicker = new cityPicker("#city-picker", {
        provincename: "provinceId",
        cityname: "cityId",
        districtname: "districtId",
        level: 'districtId', // 级别
      });
    });
    layui.use(['form','upload','laydate'], function(){
      var form = layui.form,upload = layui.upload,laydate = layui.laydate;
      //时间
      laydate.render({
        elem: '#user_birthday' //指定元素
      });
      //多图上传实例
      upload.render({
        elem: '#user_face',
        url: '<?php echo url("AjaxAction/upload"); ?>',
        accept:"images",
        acceptMime: 'image/*',
        exts:"jpg|png|gif|bmp|jpeg",
        auto:true,
        size:<?php echo $conf['maxfile']; ?>,
        drag:false,
        before: function(obj) {
          layer.msg('图片上传中...', {icon: 16,shade: 0.01,time: 0})
        },
        done: function(res) {
            layer.close(layer.msg('上传成功！'));
            $('input[name=user_face]').val(res.data);
            $('input[name=user_face]').css({'display':'block'});
        }
        ,error: function(){
            layer.msg('上传错误！');
        }
      });
      form.on('submit(edit)', function(data){
        $.ajax({
            type:'POST',
            url:'<?php echo url("users/edit"); ?>',
            data: {
                data:JSON.stringify(data.field)
            },
            success:function (data) {
                var status = JSON.parse(data);
                if (status.icon == 6){
                    layer.msg(status.msg,{icon: status.icon,time:1000},function(){
                        location.href="<?php echo url('users/lists'); ?>";
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
