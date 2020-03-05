<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:75:"/www/wwwroot/ccc.flv.pet/public/../application/index/view/users/orders.html";i:1582272984;s:66:"/www/wwwroot/ccc.flv.pet/application/index/view/public/header.html";i:1581956307;s:66:"/www/wwwroot/ccc.flv.pet/application/index/view/public/footer.html";i:1581862000;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>旅游公司</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link href="/static/index/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="/static/index/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/static/index/css/animate.min.css" rel="stylesheet" type="text/css" />
    <link href="/static/index/css/swiper.min.css" rel="stylesheet" type="text/css" />
    <link href="/static/index/css/global.css" rel="stylesheet" type="text/css" />
    <link href="/static/index/css/lib.css" rel="stylesheet" type="text/css" />
    <link href="/static/index/css/style.css" rel="stylesheet" type="text/css" />
    <script src="/static/index/js/global.js"></script>
    <script src="/static/index/js/cn.js"></script>
    <script src="/static/index/js/checkform.js"></script>
    <script src="/static/index/js/jquery-1.9.1.min.js"></script>
    <script src="/static/index/js/wow.min.js"></script>
    <script src="/static/index/js/bootstrap.min.js"></script>
    <script src="/static/index/js/swiper.jquery.min.js"></script>
</head>
<body>
<header id="header" class="clean trans">
    <div class="wrap1200" style="height: 100%;">
        <div id="logo" class="fl fz0 trans"> <a href="index.html"><img src="/static/index/img/38c6ff29eb.png" class="block" height="100%"></a> </div>
        <div id="menu" class="clean"> <a href="javascript:;" id="menu-btn" class="fr glyphicon glyphicon-menu-hamburger block-992"></a>
            <nav id="nav" class="fr flex flex-wrap relative text-center"> <a href="javascript:;" class="menu-close block clean relative block-992" rel="nofollow"> <i class="fr inherit fa fa-close middle"></i></a>
                <div class="nav-item">
                    <div class="relative"> <a href="/"  class="item-a <?php if($controller == "Index"): ?>on<?php endif; ?>" >首页</a> </div>
                </div>
                <div class="nav-item">
                    <div class="relative"> <a href="<?php echo url('product/index'); ?>" class="item-a <?php if($controller == "Product"): ?>on<?php endif; ?>">租车服务</a></div>
                </div>
                <div class="nav-item">
                    <div class="relative"> <a href="<?php echo url('scenic/index'); ?>" class="item-a <?php if($controller == "Scenic"): ?>on<?php endif; ?>">景点分类</a> </div>
                </div>
                <div class="nav-item">
                    <div class="relative"> <a href="<?php echo url('guide/index'); ?>" class="item-a <?php if($controller == "Guide"): ?>on<?php endif; ?>">导游信息</a> </div>
                </div>
                <div class="nav-item">
                    <div class="relative"> <a href="<?php echo url('news/index'); ?>" class="item-a <?php if($controller == "News"): ?>on<?php endif; ?>">新闻动态</a> </div>
                </div>
                <div class="nav-item">
                    <div class="relative"> <a href="<?php echo url('users/users'); ?>" class="item-a <?php if($controller == "Users"): ?>on<?php endif; ?>">个人中心</a> </div>
                </div>
            </nav>
        </div>
    </div>
</header>
<link rel="stylesheet" href="/static/layuiadmin/layui/css/layui.css" media="all">
<script src="/static/layuiadmin/layui/layui.js"></script>
<script src="/static/layuiadmin/layui_exts/city-picker/city-picker.data.js"></script>
<link href="/static/layuiadmin/layui_exts/city-picker/city-picker.css" rel="stylesheet" />
<div id="website" class="trans">
    <div class="blank20"></div>
    <style>
        #products .list-item {
            width: 21.66%;
            margin-left: 1.5%;
            margin-bottom: 2.5%;
            vertical-align: top;
        }
        .on{
            color: #009FE3 !important;
        }
    </style>
    <div id="products">
        <div class="wrap1200">
            <div class="products-list-title relative">
                <div class="title fl">个人中心</div>
            </div>
            <div class="blank25"></div>
            <div class="blank25"></div>
            <div class="fz0">
                <div class='list-item inline-block '>
                    <div class="list-item-wrap" style="min-height: auto">
                        <div class="list-item-name over">
                            <a href="<?php echo url('users/password'); ?>" title="修改密码">修改密码</a>
                        </div>
                        <div class="list-item-name over">
                            <a href="<?php echo url('users/users'); ?>" title="个人资料">个人资料</a>
                        </div>
                        <div class="list-item-name over">
                            <a href="<?php echo url('users/orders'); ?>" class="on" title="我的订单">我的订单</a>
                        </div>
                        <div class="list-item-name over">
                            <a href="javascript:;" id="logout" title="退出">退出</a>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class='list-item inline-block' style="width: 75%">
                    <div class="list-item-wrap" style="min-height: auto">
                        <span>我的订单</span>
                    </div>
                    <div class="list-item-wrap" style="min-height: auto">
                        <table class="layui-table" lay-skin="line">
                            <tr>
                                <th>订单编号</th>
                                <th>商品编号</th>
                                <th>商品名称</th>
                                <th>购买数量</th>
                                <th>创建时间</th>
                                <th>订单状态</th>
                               <th>操作</th>
                            </tr>
                            <?php if(count($orders) > 0): foreach($orders as $o): ?>
                              <tr>
                                  <td><?php echo $o['orderID']; ?></td>
                                  <td><?php echo $o['goodsID']; ?></td>
                                  <td><?php echo $o['goodsName']; ?></td>
                                  <td><?php echo $o['goodsCount']; ?></td>
                                  <td><?php echo date('Y-m-d H:i:s',$o['create_t']); ?></td>
                                  <td>
                                      <?php switch($o['status']): case "1": ?><span class="layui-btn layui-btn-normal layui-btn-xs">已付款</span><?php break; case "2": ?><span class="layui-btn layui-btn-normal layui-btn-xs">已发货</span><?php break; endswitch; ?>
                                  </td>
                                 <td><a style="color: #0D99DB" href="javascript:;" onclick="del('<?php echo $o['id']; ?>')">删除</a></td>
                              </tr>
                              <?php endforeach; else: ?>
                              <tr>
                                <td colspan="7" style="text-align:center;">暂无订单</td>
                              </tr>
                            <?php endif; ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="blank20"></div>
            <div class="blank20 hide-992"></div>
            <div class="blank20 hide-992"></div>
            <div id="turn_page">
                <?php echo $orders->render(); ?>
            </div>
            <div class="blank20"></div>
            <div class="blank20 hide-992"></div>
            <div class="blank20 hide-992"></div>
            <div class="blank20 hide-992"></div>
        </div>
        <script>
            function del(id){
              layui.use(['layer'],function () {
                var layer = layui.layer;
                layer.confirm("您确定删除该订单吗？",function(){
            		  $.post("<?php echo url('users/orders_del'); ?>",{id:id},function (res) {
                      layer.msg(res.msg,{icon:res.icon,time:1000},function(){
                        window.location.reload();
                      });
                    },'json');
            		});
              });
            }
            //退出
            layui.use(['layer'],function () {
                var layer = layui.layer;
              $('#logout').click(function(){
                layer.confirm("确认退出吗？",function(){
                  $.get("<?php echo url('users/logout'); ?>",function(res){
                      layer.msg(res.msg,{icon: 6,time:1000},function(){
                          window.location.href = "<?php echo url('login/index'); ?>";
                      });
                  },'json');
                });
              });
            });

        </script>
    </div>
</div>
<footer id="footer">
<!--    <div class="footer-nav">-->
<!--        <div class="wrap1200 clean"> <div class="item fl">-->
<!--            <div class="item-title">+ 出境游</div>-->

<!--            <div class="item-sub-title"><a href="a/chujingyou/faguo/index.html" title="法国" >法国</a></div>-->

<!--            <div class="item-sub-title"><a href="a/chujingyou/xinjiapo/index.html" title="新加坡" >新加坡</a></div>-->

<!--            <div class="item-sub-title"><a href="a/chujingyou/taiguo/index.html" title="泰国" >泰国</a></div>-->
<!--        </div><div class="item fl">-->
<!--            <div class="item-title">+ 自由行</div>-->
<!--        </div><div class="item fl">-->
<!--            <div class="item-title">+ 国内游</div>-->
<!--        </div><div class="item fl">-->
<!--            <div class="item-title">+ 签证</div>-->

<!--            <div class="item-sub-title"><a href="a/qianzheng/faguo/index.html" title="亚洲" >亚洲</a></div>-->

<!--            <div class="item-sub-title"><a href="a/qianzheng/ouzhou/index.html" title="欧洲" >欧洲</a></div>-->

<!--            <div class="item-sub-title"><a href="a/qianzheng/meizhou/index.html" title="美洲" >美洲</a></div>-->
<!--        </div>-->
<!--            <div class="tel-item fr nowrap">-->
<!--                <div class="tel"><i class="fa fa-phone fa-lg"></i> 020-88888888</div>-->
<!--                <div class="sub-tel">商务：   13988888888</div>-->
<!--                <div class="sub-tel">商务：  020-88888888</div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
    <div class="copyright">
        <div class="wrap1200">Copyright &copy; 2002-2019 版权所有</div>
    </div>
</footer>
<script src="/static/index/js/website.js"></script>
