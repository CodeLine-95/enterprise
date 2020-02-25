<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:74:"/www/wwwroot/ccc.flv.pet/public/../application/index/view/index/index.html";i:1582203801;s:66:"/www/wwwroot/ccc.flv.pet/application/index/view/public/header.html";i:1581956307;s:66:"/www/wwwroot/ccc.flv.pet/application/index/view/public/footer.html";i:1581862000;}*/ ?>

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
          <div class="item swiper-slide relative over"> <img src="uploads/190418/1-1Z41P9512CC.jpg" class="max-w100 block trans relative"> </div>
          <div class="item swiper-slide relative over"> <img src="uploads/190418/1-1Z41P95204L1.jpg" class="max-w100 block trans relative"> </div>
        </div>
        <a href="javascript:;" class="prev banner-btn trans fa fa-angle-left absolute" rel="nofollow"></a>
        <a href="javascript:;" class="next banner-btn trans fa fa-angle-right absolute" rel="nofollow"></a>
    </div>
    <div class="blank15"></div>
    <div class="blank15"></div>
    <div id="products" class="index over">
        <div class="web-title text-center">
            <div class="title-0">经典线路</div>
            <div class="title-1 ">Class Route</div>
        </div>
        <div class="categorys text-center hide-992">
            <a href="<?php echo url('product/index'); ?>" class="trans-internal inline-block" rel="nofollow">租车服务</a>
            <a href="<?php echo url('scenic/index'); ?>" class="trans-internal inline-block" rel="nofollow">景点分类</a>
            <a href="<?php echo url('guide/index'); ?>" class="trans-internal inline-block" rel="nofollow">导游信息</a>
        </div>
        <div class="categorys text-center wow fadeInUp block-992 relative">
            <div class="dropdown inline-block">
                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> 所有 <span class="caret"></span> </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">

                    <li><a href="<?php echo url('product/index'); ?>" rel="nofollow" cid="1">租车服务</a></li>

                    <li><a href="<?php echo url('scenic/index'); ?>" rel="nofollow" cid="1">景点分类</a></li>

                    <li><a href="<?php echo url('guide/index'); ?>" rel="nofollow" cid="1">导游信息</a></li>

                </ul>
            </div>
        </div>
<!--        <div class="products-list clean max-limit swiper-container">-->
<!--            <div class="swiper-wrapper"> <a class="item fl relative scale swiper-slide" fid="1" href="a/chujingyou/faguo/18.html" uid="0,1,">-->
<!--                <div class="over"><img src="uploads/allimg/190419/1-1Z4191616060-L.jpg" alt="" class="max-w100 block scale-img trans"></div>-->
<!--                <div class="name absolute">迪拜经典线路</div>-->
<!--            </a>-->
<!--                <a class="item fl relative scale swiper-slide" fid="1" href="a/chujingyou/24.html" uid="0,1,">-->
<!--                    <div class="over"><img src="uploads/allimg/190419/1-1Z4191641430-L.jpg" alt="" class="max-w100 block scale-img trans"></div>-->
<!--                    <div class="name absolute">泰国1</div>-->
<!--                </a>-->
<!--                <a class="item fl relative scale swiper-slide" fid="1" href="a/chujingyou/23.html" uid="0,1,">-->
<!--                    <div class="over"><img src="uploads/allimg/190419/1-1Z4191639500-L.jpg" alt="" class="max-w100 block scale-img trans"></div>-->
<!--                    <div class="name absolute">法国一</div>-->
<!--                </a>-->
<!--                <a class="item fl relative scale swiper-slide" fid="1" href="a/chujingyou/22.html" uid="0,1,">-->
<!--                    <div class="over"><img src="uploads/allimg/190419/1-1Z419163U70-L.jpg" alt="" class="max-w100 block scale-img trans"></div>-->
<!--                    <div class="name absolute">新加坡1</div>-->
<!--                </a>-->
<!--                <a class="item fl relative scale swiper-slide" fid="1" href="a/chujingyou/21.html" uid="0,1,">-->
<!--                    <div class="over"><img src="uploads/allimg/190419/1-1Z419162Q80-L.jpg" alt="" class="max-w100 block scale-img trans"></div>-->
<!--                    <div class="name absolute">泰国</div>-->
<!--                </a>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="opt text-center fz0 nowrap"> <a href="javascript:;" class="prev inline-block middle arrow arrow-left relative trans trans-internal" rel="nofollow"></a> <a href="a/chujingyou/index.html" class="inline-block middle more glyphicon glyphicon-th-large trans" title="查看更多列表"></a> <a href="javascript:;" class="next inline-block middle arrow arrow-right relative trans trans-internal" rel="nofollow"></a> </div>-->
    </div>
    <div class="blank20"></div>
    <div class="blank25"></div>
    <div class="blank20"></div>
    <div class="blank20"></div>
    <div class="blank20"></div>
    <div id="index-news">
        <div class="wrap1596 over border">
            <?php foreach($news as $k=>$n): ?>
            <div class="item fl clean">
                <div class="main <?php if($k < 2): ?>fl<?php else: ?>fr<?php endif; ?> border-box">
                    <div class="news-date">19-04-19</div>
                    <div class="news-title block" href=""><a href="<?php echo url('news/detail',array('id'=>$n['id'])); ?>"><?php echo $n['title']; ?></a></div>
                    <div class="news-brief"><?php echo $n['desc']; ?></div>
                </div>
                <div class="img scale over fr relative right clean"><a href="<?php echo url('news/detail',array('id'=>$n['id'])); ?>"><img src="<?php echo $n['pic']; ?>" class="max-w100 trans scale-img" /></a></div>
            </div>
            <?php endforeach; ?>

            <div class="clear"></div>
        </div>
        <div class="blank25"></div>
        <div class="blank25"></div>
        <a class="see-more block text-center" href="<?php echo url('news/index'); ?>">查看更多 ></a> </div>
    <div class="blank25"></div>
    <div class="blank25"></div>
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
