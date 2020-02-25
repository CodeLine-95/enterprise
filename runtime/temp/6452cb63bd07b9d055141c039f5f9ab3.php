<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:76:"/www/wwwroot/ccc.flv.pet/public/../application/index/view/product/index.html";i:1581868507;s:66:"/www/wwwroot/ccc.flv.pet/application/index/view/public/header.html";i:1581956307;s:66:"/www/wwwroot/ccc.flv.pet/application/index/view/public/footer.html";i:1581862000;}*/ ?>
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
<div id="website" class="trans">
    <div id="banner" class="banner relative fz0 swiper-container max-limit">
        <div class="swiper-wrapper">
            <div class="item swiper-slide relative over"> <img src="/static/index/img/63f6710629.jpg" class="max-w100 block trans relative"> </div>
        </div>
    </div>
    <div class="blank20"></div>
    <style>
        #products .list-item {
            width: 21.66%;
            margin-left: 1.5%;
            margin-bottom: 2.5%;
            vertical-align: top;
        }
        .stui-screen__list {
            position: relative;
            padding: 10px 0 5px;
        }
        .stui-screen__list li {
            float: left;
            margin-right: 10px;
            margin-bottom: 10px;
        }
        .stui-screen__list li span {
            display: inline-block;
            padding: 3px 0 3px;
        }
        .stui-screen__list li a {
            color: #333333;
        }
        .stui-screen__list li a {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 2px;
        }
        .text-muted {
            color: #999999;
        }
        .on{
            color: #009FE3 !important;
        }
    </style>
    <div id="products">
        <div class="wrap1200">
            <div class="products-list-title relative">
                <div class="title fl">租车服务</div>
            </div>
            <div class="blank25"></div>
            <div class="fz0">
                <div class='list-item inline-block' style="width: 100%;">
                    <ul class="stui-screen__list type-slide bottom-line-dot clearfix">
                        <li>
                            <span class="text-muted">国内汽车</span>
                        </li>
                        <?php foreach($china_cate as $c): ?>
                            <li><a href="<?php echo url('product/index',array('cid'=>$c['id'])); ?>" class="text-muted <?php if(isset($params['cid']) && $params['cid'] == $c['id']): ?>on<?php endif; ?>"><?php echo $c['cate_name']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php if(!empty($_cate)): ?>
                    <ul class="stui-screen__list type-slide bottom-line-dot clearfix">
                        <li>
                            <span class="text-muted">国外汽车</span>
                        </li>
                        <?php foreach($_cate as $_c): ?>
                        <li><a href="<?php echo url('product/index',array('cid'=>$_c['id'])); ?>" class="text-muted <?php if(isset($params['cid']) && $params['cid'] == $_c['id']): ?>on<?php endif; ?>"><?php echo $_c['cate_name']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
            <div class="blank25"></div>
            <div class="fz0">
                <?php foreach($list as $l): ?>
                <div class='list-item inline-block '>
                    <a href="<?php echo url('product/detail',array('id'=>$l['id'])); ?>"><img src="<?php echo $l['pic']; ?>" width="100%" alt="<?php echo $l['name']; ?>" /></a>
                    <div class="list-item-wrap" style="min-height: auto">
                        <div class="list-item-name over"><a href="<?php echo url('scenic/detail',array('id'=>$l['id'])); ?>" title="<?php echo $l['name']; ?>"><?php echo $l['name']; ?></a></div>
                        <div class="clear"></div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="blank20"></div>
            <div class="blank20 hide-992"></div>
            <div class="blank20 hide-992"></div>
            <div id="turn_page">
                <?php echo $list->render(); ?>
            </div>
            <div class="blank20"></div>
            <div class="blank20 hide-992"></div>
            <div class="blank20 hide-992"></div>
            <div class="blank20 hide-992"></div>
        </div>
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