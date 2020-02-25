<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:78:"/www/wwwroot/ccc.flv.pet/public/../application/admin/view/power/poweredit.html";i:1566482652;s:65:"/www/wwwroot/ccc.flv.pet/application/admin/view/public/title.html";i:1581519893;s:66:"/www/wwwroot/ccc.flv.pet/application/admin/view/public/footer.html";i:1566482652;}*/ ?>
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
          <div class="layui-card-header">编辑规则</div>
          <div class="layui-card-body" pad15>
            <form class="layui-form" method="post">
              <input type="hidden" name="id" value="<?php echo $field['id']; ?>">
              <div class="layui-form-item">
                <label for="pid" class="layui-form-label">上级</label>
                <div class="layui-input-inline">
                  <select id="pid" name="pid" class="valid">
                    <option value="0" selected>顶级</option>
                    <?php foreach($rules as $rule): ?>
                    <option value="<?php echo $rule['id']; ?>" <?php if($field['pid'] == $rule['id']): ?>selected<?php endif; ?>><?php echo $rule['_name']; ?> </option> <?php endforeach; ?> </select> </div> </div> <div class="layui-form-item">
                      <label class="layui-form-label" for="title">规则名称</label>
                      <div class="layui-input-block">
                        <input type="text" id="title" name="name" value="<?php echo $field['name']; ?>" lay-verify="required" class="layui-input">
                      </div>
                </div>

                <div class="layui-form-item">
                  <label class="layui-form-label" for="url">规则节点</label>
                  <div class="layui-input-block">
                    <input name="url" style="width: 50%;" id="url" value="<?php echo $field['url']; ?>" type="text" lay-verify="required" autocomplete="off" class="layui-input layui-input-inline">
                    <span style="line-height: 38px;color:red;"><i class="layui-icon" style="font-size:14px;margin-right: 5px;">&#xe702;</i>如：admin/user/adduser (一级节点添加“#”即可)</span>
                  </div>
                </div>

                <div class="layui-form-item">
                  <label for="sort" class="layui-form-label">菜单排序</label>
                  <div class="layui-input-block">
                    <input type="text" id="sort" name="sort" value="<?php echo $field['sort']; ?>" autocomplete="off" class="layui-input layui-input-inline">
                  </div>
                </div>

                <div class="layui-form-item">
                  <label for="iconPicker" class="layui-form-label">字体图标</label>
                  <div class="layui-input-block">
                    <input type="text" id="iconPicker" name="icon" value="<?php echo $field['icon']; ?>" lay-filter="iconPicker" class="layui-input">
                  </div>
                </div>

                <div class="layui-form-item">
                  <label for="status" class="layui-form-label">规则状态</label>
                  <div class="layui-input-block">
                    <input type="radio" name="status" value="1" title="正常" <?php if($field['status'] == 1): ?>checked<?php endif; ?>> <input type="radio" name="status" value="0" title="停用" <?php if($field['status'] == 0): ?>checked<?php endif; ?>> </div> </div> <div
                      class="layui-form-item">
                    <div class="layui-input-block">
                      <button class="layui-btn" lay-submit lay-filter="poweredit">编辑规则</button>
                    </div>
                  </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
  layui.config({
    base: '/static/layuiadmin/' //静态资源所在路径
  }).extend({
    index: 'lib/index' //主入口模块
  }).use('index');
</script>
  <script type="text/javascript">
    layui.config({
      base: '/static/layuiadmin/layui_exts/' //配置 layui 第三方扩展组件存放的基础目录
    }).extend({
      regionSelect: 'iconPicker'
    }).use(['iconPicker'], function() {
      $ = layui.jquery;
      var iconPicker = layui.iconPicker;
      iconPicker.render({
        // 选择器，推荐使用input
        elem: '#iconPicker',
        // 数据类型：fontClass/unicode，推荐使用fontClass
        type: 'fontClass',
        // 是否开启搜索：true/false
        search: true,
        // 点击回调
        click: function(data) {
          console.log(data.icon);
          $('input[name=icon]').val(data.icon);
        }
      });
      icon = "<?php echo $field['icon']; ?>";
      iconPicker.checkIcon('iconPicker', icon);
    });
    layui.use(['form'], function() {
      var form = layui.form;
      form.on('submit(poweredit)', function(data) {
        $.ajax({
          url: "<?php echo url('power/poweredit'); ?>",
          type: 'POST',
          data: {
            data: JSON.stringify(data.field)
          },
          success: function(data) {
            var message = JSON.parse(data);
            if (message.icon == 6) {
              layer.msg(message.msg, {
                icon: message.icon,
                time: 1000
              }, function() {
                window.parent.location.reload();
              });
            } else {
              layer.msg(message.msg, {
                icon: message.icon,
                time: 1000
              });
            }
          }
        });
        return false;
      })
    });
  </script>
</body>

</html>