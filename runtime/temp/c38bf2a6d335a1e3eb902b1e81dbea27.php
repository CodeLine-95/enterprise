<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:74:"/www/wwwroot/ccc.flv.pet/public/../application/admin/view/index/index.html";i:1582124687;s:65:"/www/wwwroot/ccc.flv.pet/application/admin/view/public/title.html";i:1581519893;s:66:"/www/wwwroot/ccc.flv.pet/application/admin/view/public/footer.html";i:1566482652;}*/ ?>
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
  <div id="LAY_app">
    <div class="layui-layout layui-layout-admin">
      <div class="layui-header">
        <ul class="layui-nav layui-layout-left">
          <li class="layui-nav-item layadmin-flexible" lay-unselect>
            <a href="javascript:;" layadmin-event="flexible" title="侧边伸缩">
              <i class="layui-icon layui-icon-shrink-right" id="LAY_app_flexible"></i>
            </a>
          </li>
        </ul>
        <ul class="layui-nav  layui-layout-right">
          <li class="layui-nav-item" lay-unselect>
            <a href="javascript:;" layadmin-event="refresh" title="刷新">
              <i class="layui-icon layui-icon-refresh"></i>
              <!-- <cite>刷新</cite> -->
            </a>
          </li>
          <li class="layui-nav-item" lay-unselect="">
            <a href="javascript:;">
              <?php if($user['user_face'] == ''): ?>
              <img src="//t.cn/RCzsdCq" class="layui-nav-img">
              <?php else: ?>
              <img src="<?php echo $user['user_face']; ?>" class="layui-nav-img">
              <?php endif; ?>
              <?php echo $user['user_name']; ?>
            </a>
            <dl class="layui-nav-child">
             <dd onclick="pwdedit('<?php echo url('AjaxAction/password'); ?>')"><a href="javascript:;">修改密码</a></dd>
              <dd id="delcache"><a href="javascript:;">清除缓存</a></dd>
              <dd id="logout"><a href="javascript:;">退出系统</a></dd>
            </dl>
          </li>
        </ul>
      </div>

      <!-- 侧边菜单 -->
      <div class="layui-side layui-side-menu">
        <div class="layui-side-scroll">
          <div class="layui-logo" lay-href="<?php echo url('index/console'); ?>">
            <span><b><?php echo $system['title']; ?></b></span>
          </div>

          <ul class="layui-nav layui-nav-tree" id="nav">
            <?php foreach($childMenu as $cm): ?>
            <li class="layui-nav-item">
              <?php if(!isset($cm['url'])): ?>
              <a href="javascript:;" lay-tips="<?php echo $cm['name']; ?>" lay-direction="2">
                <i class="layui-icon <?php echo $cm['icon']; ?>"></i>
                <cite><?php echo $cm['name']; ?></cite>
              </a>
              <?php else: ?>
              <a lay-href="<?php echo $cm['url']; ?>" lay-tips="<?php echo $cm['name']; ?>" lay-direction="2">
                <i class="layui-icon <?php echo $cm['icon']; ?>"></i>
                <cite><?php echo $cm['name']; ?></cite>
              </a>
              <?php endif; if(!(empty($cm['child']) || (($cm['child'] instanceof \think\Collection || $cm['child'] instanceof \think\Paginator ) && $cm['child']->isEmpty()))): ?>
              <dl class="layui-nav-child">
                <?php foreach($cm['child'] as $cd): ?>
                <dd><a lay-href="<?php echo $cd['url']; ?>">
                    <i class="layui-icon <?php echo $cd['icon']; ?>"></i>
                    <cite><?php echo $cd['name']; ?></cite>
                  </a>
                </dd>
                <?php endforeach; ?>
              </dl>
              <?php endif; ?>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>

      <!-- 页面标签 -->
      <div class="layadmin-pagetabs" id="LAY_app_tabs">
        <div class="layui-icon layadmin-tabs-control layui-icon-prev" layadmin-event="leftPage"></div>
        <div class="layui-icon layadmin-tabs-control layui-icon-next" layadmin-event="rightPage"></div>
        <div class="layui-icon layadmin-tabs-control layui-icon-down">
          <ul class="layui-nav layadmin-tabs-select" lay-filter="layadmin-pagetabs-nav">
            <li class="layui-nav-item" lay-unselect>
              <a href="javascript:;"></a>
              <dl class="layui-nav-child layui-anim-fadein">
                <dd layadmin-event="closeThisTabs"><a href="javascript:;">关闭当前标签页</a></dd>
                <dd layadmin-event="closeOtherTabs"><a href="javascript:;">关闭其它标签页</a></dd>
                <dd layadmin-event="closeAllTabs"><a href="javascript:;">关闭全部标签页</a></dd>
              </dl>
            </li>
          </ul>
        </div>
        <div class="layui-tab" lay-unauto lay-allowClose="true" lay-filter="layadmin-layout-tabs">
          <ul class="layui-tab-title" id="LAY_app_tabsheader">
            <li lay-id="<?php echo url('index/console'); ?>" class="layui-this"><i class="layui-icon layui-icon-home"></i></li>
          </ul>
        </div>
      </div>


      <!-- 主体内容 -->
      <div class="layui-body" id="LAY_app_body">
        <div class="layadmin-tabsbody-item layui-show">
          <iframe src="<?php echo url('index/console'); ?>" frameborder="0" class="layadmin-iframe"></iframe>
        </div>
      </div>

      <!-- 辅助元素，一般用于移动设备下遮罩 -->
      <div class="layadmin-body-shade" layadmin-event="shade"></div>
    </div>
  </div>
  <script>
  layui.config({
    base: '/static/layuiadmin/' //静态资源所在路径
  }).extend({
    index: 'lib/index' //主入口模块
  }).use('index');
</script>
  <script>
    // 退出登陆
    $(function() {
      $('#logout').click(function() {
        layer.confirm("您确定退出吗？", function() {
          $.ajax({
            type: 'post',
            url: '<?php echo url("AjaxAction/logout"); ?>',
            data: {},
            success: function(data) {
              var status = JSON.parse(data);
              layer.msg(status.msg, {
                icon: status.icon,
                time: 1000
              }, function() {
                location.href = '<?php echo url("login/login"); ?>';
              });
            }
          });
        });
      });
      // 清除缓存
      $("#delcache").click(function() {
        layer.confirm("为了提高用户体验，请您经常清除缓存", function() {
          $.ajax({
            url: "<?php echo url('AjaxAction/delruntime'); ?>",
            data: {},
            type: 'get',
            success: function(data) {
              layer.msg('删除缓存成功', {
                icon: 6,
                time: 1000
              });
            }
          });
        });
      });
    });
    // 修改密码弹框
    function pwdedit(url) {
      layer.prompt({
        title: '请输入新密码：',
        formType: 1
      }, function(pass, index) {
        $.ajax({
          url: url,
          data: {
            pass: pass
          },
          type: 'post',
          success: function(data) {
            var status = JSON.parse(data);
            if (status.icon == 6) {
              layer.msg(status.msg, {
                icon: status.icon,
                time: 1000
              }, function() {
                window.location.reload();
              });
            } else {
              layer.msg(status.msg, {
                icon: status.icon,
                time: 1000
              });
            }
          }
        });
      });
    }
  </script>
</body>

</html>
