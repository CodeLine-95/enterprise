<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:76:"/www/wwwroot/ccc.flv.pet/public/../application/index/view/scenic/detail.html";i:1581861537;s:66:"/www/wwwroot/ccc.flv.pet/application/index/view/public/header.html";i:1581956307;s:66:"/www/wwwroot/ccc.flv.pet/application/index/view/public/footer.html";i:1581862000;}*/ ?>
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
    <div id="products">
        <div class="wrap1200 path"> 当前位置：<a href='/'>首页</a> > <a href='<?php echo url("scenic/index"); ?>'>景点分类</a> >  </div>
        <div class="wrap1200">
            <div class="detail-box clean">
                <div class="img fl">
                    <div class="big-imgs swiper-container text-center">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide fz0">
                                <img src="<?php echo $field['pic']; ?>" alt="" class="max-w100" >
                            </div>
<!--                            <div class="swiper-slide fz1">-->
<!--                                <img src="../../uploads/allimg/190419/1-1Z419163Z2.jpg" alt="" class="max-w100" >-->
<!--                            </div>-->
<!--                            <div class="swiper-slide fz2">-->
<!--                                <img src="../../uploads/allimg/190419/1-1Z419163Z3.jpg" alt="" class="max-w100" >-->
<!--                            </div>-->
                        </div>
                    </div>
                    <!--<div class="small-img relative">
                      <div class="fa fa-angle-left fa-3x absolute"></div>
                      <div class="small-img-wrap swiper-container clean">
                        <div class="swiper-wrapper"> <div class="small-img-item swiper-slide fz0"><img src="/204/uploads/allimg/190419/1-1Z419163U2.jpg" width="100%"/></div><div class="small-img-item swiper-slide fz1"><img src="/204/uploads/allimg/190419/1-1Z419163Z2.jpg" width="100%"/></div><div class="small-img-item swiper-slide fz2"><img src="/204/uploads/allimg/190419/1-1Z419163Z3.jpg" width="100%"/></div> </div>
                      </div>
                      <div class="fa fa-angle-right fa-3x absolute"></div>
                    </div>-->
                </div>
                <div class="right-info fr">
                    <div class="blank20"></div>
                    <div class="name"><?php echo $field['name']; ?></div>
                    <div class="blank20"></div>
                    <div class="brief"><?php echo $field['desc']; ?></div>
                    <div class="blank12"></div>
                </div>
            </div>
        </div>
        <div class="blank25"></div>
        <div class="wrap1200 des-wrap">
            <div class="card-wrap clean">
                <div class="card fl on">详细内容</div>
            </div>
            <div class="des block">第1天 深圳&mdash;香港&mdash;曼谷<br />
                抵达城市：曼谷<br />
                用 &nbsp; &nbsp; &nbsp; 餐：早餐：敬请自理； 午餐：敬请自理； 晚餐：敬请自理；<br />
                住 &nbsp; &nbsp; &nbsp; 宿：曼谷<br />
                交 &nbsp; &nbsp; &nbsp; 通：飞机、汽车<br />
                于指定时间在深圳蛇口码头（国际港澳大厅）或深圳湾口岸集合，由领队带领办理相关出国手续。乘船或乘车前往香港国际机场（约45分钟），搭乘班机自香港直飞&ldquo;天使之都&rdquo;&mdash;曼谷（约3小时），抵达泰国曼谷机场，后入住酒店休息。<br />
                温馨提示：<br />
                1、请出发前仔细阅读我们为团友精心准备的泰国游注意事项。<br />
                2、如对航班有特殊要求，请及时和工作人员落实出团准确航班，以免耽误行程<br />
                第2天 曼谷<br />
                抵达城市：曼谷<br />
                用 &nbsp; &nbsp; &nbsp; 餐：早餐：含； 午餐：含； 晚餐：含；<br />
                住 &nbsp; &nbsp; &nbsp; 宿：曼谷<br />
                交 &nbsp; &nbsp; &nbsp; 通：汽车<br />
                早餐后：【阿兰达博物馆】（约60分钟）<br />
                午餐后：【拉玛皇朝大皇宫、玉佛寺】（约90分钟）-【游湄南河、远眺郑皇庙】（约30分钟）<br />
                晚餐后：返回酒店休息。阿兰达皇家博物馆（Throne Anantasamakom）<br />
                2006年九世泰王在此宴请全世界各国贵宾后，才对外开放的皇家博物馆。国王专门聘请意大利着名工匠建造，具有浓浓的欧式风情。它不仅外观气势恢宏，内饰细节精美绝伦。博物馆内遍布奇珍异宝，各式精贵的皇家珍品琳琅满目，价值连城，让人叹为观止。</div>
            <div class="des clean none fz0"> </div>
        </div>
    </div>
    <div class="blank20"></div>
    <div class="blank20"></div>
    <div class="blank20"></div>
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