<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:77:"/www/wwwroot/ccc.flv.pet/public/../application/index/view/product/detail.html";i:1582272880;s:66:"/www/wwwroot/ccc.flv.pet/application/index/view/public/header.html";i:1581956307;s:66:"/www/wwwroot/ccc.flv.pet/application/index/view/public/footer.html";i:1581862000;}*/ ?>
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
<div id="website" class="trans">
    <div id="banner" class="banner relative fz0 swiper-container max-limit">
        <div class="swiper-wrapper">
            <div class="item swiper-slide relative over"> <img src="/static/index/img/63f6710629.jpg" class="max-w100 block trans relative"> </div>
        </div>
    </div>
    <div class="blank20"></div>
    <style>
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
        .layui-form-radio>i:hover, .layui-form-radioed>i {
            color: #009FE3;
        }
    </style>
    <div id="products">
        <div class="wrap1200 path"> 当前位置：<a href='/'>首页</a> > <a href='<?php echo url("product/index"); ?>'>租车服务</a> >  </div>
        <div class='wrap1200' style="width: 100%;padding: 1.666% 2.08333%;">
            <ul class="stui-screen__list type-slide bottom-line-dot clearfix">
                <li>
                    <span class="text-muted">国内汽车</span>
                </li>
                <?php foreach($china_cate as $c): ?>
                <li><a href="<?php echo url('product/index',array('cid'=>$c['id'])); ?>" class="text-muted <?php if($field['cid'] == $c['id']): ?>on<?php endif; ?>"><?php echo $c['cate_name']; ?></a></li>
                <?php endforeach; ?>
            </ul>
            <?php if(!empty($_cate)): ?>
            <ul class="stui-screen__list type-slide bottom-line-dot clearfix">
                <li>
                    <span class="text-muted">国外汽车</span>
                </li>
                <?php foreach($_cate as $_c): ?>
                <li><a href="<?php echo url('product/index',array('cid'=>$_c['id'])); ?>" class="text-muted <?php if($field['cid'] == $_c['id']): ?>on<?php endif; ?>"><?php echo $_c['cate_name']; ?>"><?php echo $_c['cate_name']; ?></a></li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
        </div>
        <div class="wrap1200">
            <div class="detail-box clean">
                <div class="img fl">
                    <div class="big-imgs swiper-container text-center">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide fz0">
                                <img src="<?php echo $field['pic']; ?>" alt="" class="max-w100" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right-info fr">
                    <div class="blank20"></div>
                    <div class="name">商品名称：<?php echo $field['name']; ?></div>
                    <div class="blank20"></div>
                    <div class="brief">商品库存：<?php echo $field['stock']; ?> 件</div>
                    <div class="blank12"></div>
                    <div class="brief">浏览次数：<?php echo $field['view']; ?> 次</div>
                    <div class="blank12"></div>
                    <div class="brief">购买数量：<input type="text" name="num" value="1" onchange="getValue(this)" style="width: 50px;text-align: center"> 件</div>
                    <div class="blank12"></div>
                    <div class="brief"><button id="buy" data-id="<?php echo $field['id']; ?>" data-num="1" style="border: none; background: #009FE3;color: #fff;">购买</button></div>
                    <div class="blank12"></div>
                    <script>
                        function getValue(obj){
                            $('#buy').attr('data-num',obj.value)
                        }

                        $('#buy').click(function () {
                            var id = $(this).attr('data-id');
                            var num = $(this).attr('data-num');

                            $.post("<?php echo url('product/buy_action'); ?>",{id:id,num:num},function (res) {
                                console.log(res)
                                if (res.code == 0){
                                    alert('购买成功');
                                    window.location.href = "<?php echo url('users/orders'); ?>";
                                }else{
                                    alert(res.msg);
                                }
                            },'json');
                        });
                    </script>
                </div>
            </div>
        </div>
        <div class="blank25"></div>
        <div class="wrap1200 des-wrap">
            <div class="card-wrap clean">
                <div class="card fl">详细内容</div>
                <div class="card fl on">宝贝评论</div>
            </div>
            <div class="des block" style="display: none;">
                <?php echo $field['desc']; ?>
            </div>
            <div class="des block">
              <div class="layui-card" style="overflow: hidden;">
                <table class="layui-table">
                  <thead>
                    <tr>
                      <th align="center">评论用户</th>
                      <th align="center">评论商品</th>
                      <th align="center">评论内容</th>
                      <th align="center">评论星级</th>
                      <th align="center">是否好评</th>
                      <th align="center">评论时间</th>
                      <th align="center">评论设备</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($comment as $c): ?>
                    <tr>
                      <td><?php echo $c['user_name']; ?></td>
                      <td><?php echo $c['product_name']; ?></td>
                      <td><?php echo $c['comment']; ?></td>
                      <td><?php echo $c['rate']; ?></td>
                      <td><?php if($c['is_praise'] == 1): ?>好评<?php elseif($c['is_praise'] == 2): ?>中评<?php else: ?>差评<?php endif; ?></td>
                      <td><?php echo date('Y-m-d H:i:s',$c['create_t']); ?></td>
                      <td><?php echo $c['device']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                <div id="turn_page" style="margin: 10px 0;">
                    <?php echo $comment->render(); ?>
                </div>
              </div>
              <div class="layui-card">
                <div class="layui-card-header">发表评论</div>
                <div class="layui-form layui-card-body">
                    <input type="hidden" name="product_id" value="<?php echo $field['id']; ?>">
                    <input type="hidden" name="product_name" value="<?php echo $field['name']; ?>">
                    <input type="hidden" name="uid" value="<?php echo $user['id']; ?>">
                    <input type="hidden" name="user_name" value="<?php echo $user['user_name']; ?>">
                    <input type="hidden" name="type" value="1">
                    <div class="layui-form-item">
                        <label class="layui-form-label" for="user_name">评论内容</label>
                        <div class="layui-input-block">
                            <textarea name="comment" id="comment" class="layui-textarea"></textarea>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">是否好评</label>
                        <div class="layui-input-block">
                            <input type="radio" name="is_praise" title="好评" value="1" checked class="layui-input">
                            <input type="radio" name="is_praise" title="中评" value="2" class="layui-input">
                            <input type="radio" name="is_praise" title="差评" value="3" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label" for="rate">星级</label>
                        <div class="layui-input-block">
                            <input type="text" class="layui-input" value="5" id="rate" name="rate">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <label class="layui-form-label"><button class="layui-btn" lay-submit lay-filter="comment">评论</button></label>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="blank20"></div>
    <div class="blank20"></div>
    <div class="blank20"></div>
    <script type="text/javascript">
      layui.use(['form'],function () {
        var form = layui.form;
        //保存信息
        form.on('submit(comment)', function(data){
            $.post('<?php echo url("product/comment_action"); ?>',data.field,function (res) {
                if (res.icon == 6){
                    layer.msg(res.msg,{icon: res.icon,time:1000},function(){
                        window.location.reload();
                    });
                } else {
                    layer.msg(res.msg,{icon: res.icon,time:1000},function(){
                        window.location.reload();
                    });
                }
            },'json');
            return false;
        });
      });
    </script>
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
