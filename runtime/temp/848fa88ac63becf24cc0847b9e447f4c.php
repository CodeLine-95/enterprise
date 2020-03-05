<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"/Applications/MAMP/htdocs/bbbbbb/public/../application/admin/view/index/console.html";i:1582640730;}*/ ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>layuiAdmin 控制台主页一</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="stylesheet" href="/static/layuiadmin/layui/css/layui.css" media="all">
  <link rel="stylesheet" href="/static/layuiadmin/style/admin.css" media="all">
</head>
<body>
  <div class="layui-fluid">
    <div class="layui-row layui-col-space15">
      <div class="layui-col-sm6 layui-col-md3">
          <div class="layui-card">
              <div class="layui-card-header">新闻</div>
              <div class="layui-card-body  ">
                  <p class="layuiadmin-big-font"><?php echo $newsCount; ?></p>
              </div>
          </div>
      </div>
      <div class="layui-col-sm6 layui-col-md3">
          <div class="layui-card">
              <div class="layui-card-header">用户</div>
              <div class="layui-card-body  ">
                  <p class="layuiadmin-big-font"><?php echo $UsersCount; ?></p>
              </div>
          </div>
      </div>
      <div class="layui-col-md8">
          <div class="layui-card">
              <div class="layui-card-header">服务器信息</div>
              <div class="layui-card-body layui-text">
                  <table class="layui-table">
                      <colgroup><col width="100"><col><col width="100"><col></colgroup>
                      <tbody>
                          <tr>
                              <td>操作系统</td>
                              <td><?php echo PHP_OS; ?></td>
                              <td>脚本引擎</td>
                              <td><?php echo \think\Request::instance()->server('server_software'); ?></td>
                          </tr>
                          <tr>
                              <td>PHP版本</td>
                              <td><?php echo PHP_VERSION; ?></td>
                              <td>CURL支持</td>
                              <td><?php $curl = @curl_version();echo $curl['version'] ? $curl['version'] : '<i class="layui-icon layui-icon-close" style="font-size: 22px; color: #FF5722;"></i>'; ?></td>
                          </tr>
                          <tr>
                              <td>安装目录</td>
                              <td><?php echo \think\Request::instance()->server('DOCUMENT_ROOT'); ?></td>
                              <td>服务器</td>
                              <td><?php echo \think\Request::instance()->server('HTTP_HOST'); ?></td>
                          </tr>
                          <tr>
                              <td>最大上传</td>
                              <td><?php echo get_cfg_var("file_uploads") ? get_cfg_var("upload_max_filesize") : '<i class="layui-icon layui-icon-close" style="font-size: 22px; color: #FF5722;"></i>';?></td>
                              <td>GD图形库</td>
                              <td><?php $gd = @gd_info(); echo $gd['GD Version'] ? $gd['GD Version'] : '<i class="layui-icon layui-icon-close" style="font-size: 22px; color: #FF5722;"></i>';?></td>
                          </tr>
                          <tr>
                              <td>脚本超时</td>
                              <td><?php $t = ini_get("max_execution_time"); echo $t;?>秒</td>
                              <td>mysql</td>
                              <td><?php echo Think\Db::query("select version() as v;")[0]['v']; ?></td>
                          </tr>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
      <div class="layui-col-md4">
        <div class="layui-card">
          <div class="layui-card-header">版本信息</div>
          <div class="layui-card-body layui-text">
            <table class="layui-table">
              <colgroup>
                <col width="100">
                <col>
              </colgroup>
              <tbody>
                <tr>
                  <td>开发版本</td>
                  <td>
                    <script type="text/html" template>
                      <?php echo config('JT_V'); ?>
                    </script>
                  </td>
                </tr>
                <tr>
                  <td>开发者</td>
                  <td>枫零落</td>
                </tr>
                <tr>
                  <td>ThinkPHP</td>
                  <td>
                    <script type="text/html" template>
                      <?php echo THINK_VERSION; ?>
                    </script>
                  </td>
                </tr>
                <tr>
                  <td>Layui</td>
                  <td>
                    <script type="text/html" template>
                      {{ layui.v }}
                    </script>
                 </td>
                </tr>
                <tr>
                  <td>主要特色</td>
                  <td>零门槛 / 响应式 / 清爽 / 极简</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- <div class="layui-col-md12">
        <div class="layui-card">
          <div class="layui-card-header">数据概览</div>
          <div class="layui-card-body">
            <div class="layui-carousel layadmin-carousel layadmin-dataview" data-anim="fade" lay-filter="LAY-index-dataview">
              <div carousel-item id="LAY-index-dataview">
                <div><i class="layui-icon layui-icon-loading1 layadmin-loading"></i></div>
                <div></div>
                <div></div>
              </div>
            </div>
          </div>
        </div>
      </div> -->

    </div>
  </div>

  <script src="/static/layuiadmin/layui/layui.js?t=1"></script>
  <script>
  layui.config({
    base: '/static/layuiadmin/' //静态资源所在路径
  }).extend({
    index: 'lib/index' //主入口模块
  }).use(['index', 'console']);
  </script>
</body>
</html>
