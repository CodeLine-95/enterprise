<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:73:"/www/wwwroot/ccc.flv.pet/public/../application/admin/view/power/edit.html";i:1566482652;s:65:"/www/wwwroot/ccc.flv.pet/application/admin/view/public/title.html";i:1581519893;s:66:"/www/wwwroot/ccc.flv.pet/application/admin/view/public/footer.html";i:1566482652;}*/ ?>
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

  <script type="text/javascript" src="/static/admin/js/layui-xtree.js"></script>
</head>

<body>
  <div class="layui-fluid">
    <div class="layui-row layui-col-space15">
      <div class="layui-col-md12">
        <div class="layui-card">
          <div class="layui-card-body" pad15>
            <form class="layui-form" method="post">
              <input type="hidden" name="id" value="<?php echo $field['id']; ?>">
              <div class="layui-form-item">
                <label class="layui-form-label" for="title">角色名称</label>
                <div class="layui-input-block">
                  <input type="text" id="title" name="title" value="<?php echo $field['title']; ?>" lay-verify="required" class="layui-input">
                </div>
              </div>

              <div class="layui-form-item">
                <label class="layui-form-label" for="remark">权限说明</label>
                <div class="layui-input-block">
                  <input type="text" id="remark" name="remark" value="<?php echo $field['remark']; ?>" lay-verify="required" class="layui-input">
                </div>
              </div>

              <div class="layui-form-item">
                <label for="rules" class="layui-form-label">权限分配</label>
                <div class="layui-input-block">
                  <div id="layui-xtree-checkbox" id="rules"></div>
                </div>
              </div>

              <div class="layui-form-item">
                <label for="status" class="layui-form-label">角色状态</label>
                <div class="layui-input-block">
                  <input type="radio" name="status" value="1" title="正常" <?php if($field['status'] == 1): ?>checked<?php endif; ?>> <input type="radio" name="status" value="0" title="停用" <?php if($field['status'] == 0): ?>checked<?php endif; ?>> </div> </div> <div
                    class="layui-form-item">
                  <div class="layui-input-block">
                    <button class="layui-btn layui-btn-normal" lay-submit lay-filter="edit">编辑角色</button>
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
    /*获取权限结构树*/
    var json = '';
    var id = $('input[name=id]').val();
    $.ajax({
      async: false,
      url: "<?php echo url('power/tree'); ?>",
      type: 'post',
      data: {
        id: id
      },
      success: function(data) {
        json = data;
      }
    });
    console.log(json)
    layui.use(['form', 'layer'], function() {
      $ = layui.jquery;
      var form = layui.form,
        layer = layui.layer;
      /*实例化权限树*/
      var xtree = new layuiXtree({
        elem: 'layui-xtree-checkbox',
        form: form,
        data: json,
        ckall: false,
        isopen: true,
        color: {
          open: "#1E9FFF",
          close: "#1E9FFF",
          end: "#1E9FFF"
        },
        icon: { //图标样式 （选填）
          open: "&#xe7a0;",
          close: "&#xe622;",
          end: "&#xe621;"
        }
      });
      //监听提交
      form.on('submit(edit)', function(data) {
        var oCks = xtree.GetChecked();
        var rule = [];
        for (var i = 0; i < oCks.length; i++) {
          var str = oCks[i].value;
          var strArr = str.split('-');
          var lastStr = strArr.join(',');
          rule.push(lastStr);
        }
        var rules = rule.join(',').split(',');
        $.ajax({
          url: "<?php echo url('power/edit'); ?>",
          type: "POST",
          data: {
            data: JSON.stringify(data.field),
            rules: JSON.stringify(rules)
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
      });
    });
  </script>
</body>

</html>