<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"/Applications/MAMP/htdocs/bbbbbb/public/../application/admin/view/login/login.html";i:1581148645;}*/ ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>登入 - <?php echo $system['title']; ?></title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="stylesheet" href="/static/layuiadmin/layui/css/layui.css" media="all">
  <link rel="stylesheet" href="/static/layuiadmin/style/admin.css" media="all">
  <link rel="stylesheet" href="/static/layuiadmin/style/login.css" media="all">
</head>

<body>
  <div class="layadmin-user-login layadmin-user-display-show">
    <div class="layadmin-user-login-main">
      <div class="layadmin-user-login-box layadmin-user-login-header">
        <h2><?php echo $system['title']; ?></h2>
<!--        <p>基于Layui开发的后台管理系统</p>-->
      </div>
      <form class="layui-form" method="post">
        <div class="layadmin-user-login-box layadmin-user-login-body">
          <div class="layui-form-item">
            <label class="layadmin-user-login-icon layui-icon layui-icon-username" for="LAY-user-login-username"></label>
            <input type="text" name="user_name" id="LAY-user-login-username" lay-verify="required" placeholder="用户名" class="layui-input">
          </div>
          <div class="layui-form-item">
            <label class="layadmin-user-login-icon layui-icon layui-icon-password" for="LAY-user-login-password"></label>
            <input type="password" name="user_pwd" id="LAY-user-login-password" lay-verify="required" placeholder="密码" class="layui-input">
          </div>
          <div class="layui-form-item">
            <div class="layui-row">
              <div class="layui-col-xs7">
                <label class="layadmin-user-login-icon layui-icon layui-icon-vercode" for="LAY-user-login-vercode"></label>
                <input type="text" name="vercode" id="LAY-user-login-vercode" lay-verify="required" placeholder="图形验证码" class="layui-input">
              </div>
              <div class="layui-col-xs5" style="padding-left: 16px;">
                <img src="<?php echo captcha_src(); ?>" class="verify" onclick="javascript:this.src='<?php echo captcha_src(); ?>?rand='+Math.random()" id="capimg">
              </div>
            </div>
          </div>
          <div class="layui-form-item">
            <button class="layui-btn layui-btn-fluid" lay-submit lay-filter="login">登 入</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script src="/static/layuiadmin/layui/layui.js"></script>
  <script src="/static/admin/js/jquery.min.js"></script>
  <script>
    layui.use(['form', 'element'], function() {
      var form = layui.form;
      element = layui.element;
      console.log(element);
      form.on('submit(login)', function(data) {
        $.ajax({
          type: 'POST',
          url: '<?php echo url("login/login_action"); ?>',
          data: {
            data: JSON.stringify(data.field)
          },
          success: function(data) {
            var status = JSON.parse(data);
            if (status.icon == 6) {
              layer.msg(status.msg, {
                icon: status.icon,
                time: 1000
              }, function() {
                location.href = '<?php echo url("index/index"); ?>';
              });
            } else {
              $('#capimg').attr('src', this.src = '<?php echo captcha_src(); ?>?rand=' + Math.random());
              layer.msg(status.msg, {
                icon: status.icon,
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