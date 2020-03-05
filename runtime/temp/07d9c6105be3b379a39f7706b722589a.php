<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:74:"/www/wwwroot/ccc.flv.pet/public/../application/index/view/users/users.html";i:1582204113;s:66:"/www/wwwroot/ccc.flv.pet/application/index/view/public/header.html";i:1581956307;s:66:"/www/wwwroot/ccc.flv.pet/application/index/view/public/footer.html";i:1581862000;}*/ ?>
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
        .layui-form-label{
            text-align: right;
            width: 80px;
        }
        .layui-input-block{
            margin-left: 80px;
        }
        .layui-form-radio>i:hover, .layui-form-radioed>i {
            color: #009FE3;
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
                            <a href="<?php echo url('users/users'); ?>" class="on" title="个人资料">个人资料</a>
                        </div>
                        <div class="list-item-name over">
                            <a href="<?php echo url('users/orders'); ?>" title="我的订单">我的订单</a>
                        </div>
                        <div class="list-item-name over">
                            <a href="javascript:;" id="logout" title="退出">退出</a>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class='list-item inline-block' style="width: 75%">
                    <div class="list-item-wrap" style="min-height: auto">
                        <span>个人资料</span>
                    </div>
                    <div class="list-item-wrap" style="min-height: auto">
                        <div class="layui-form">
                            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                            <div class="layui-form-item">
                                <label class="layui-form-label" for="user_name">姓名</label>
                                <div class="layui-input-block">
                                    <input type="text" class="layui-input" value="<?php echo $user['user_name']; ?>" id="user_name" name="user_name">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label" for="user_email">邮箱</label>
                                <div class="layui-input-block">
                                    <input type="email" name="user_email" value="<?php echo $user['user_email']; ?>" id="user_email" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label" for="user_face">头像</label>
                                <div class="layui-input-block">
                                    <button type="button" style="float:left;margin-right:1%;" id="user_face" class="layui-btn"><i class="layui-icon">&#xe67c;</i>上传头像</button>
                                    <input type="text" value="<?php echo $user['user_face']; ?>" style="width:53%;float:left;display:none;background-color:#dcdcdc;" readonly name="user_face" class="layui-input">
                                    <?php if(empty($user['user_face'])): ?>
                                    <div id="pic_img" style="margin-top: 10px;">

                                    </div>
                                    <?php else: ?>
                                    <div id="pic_img" style="margin-top: 10px;">
                                        <img src="<?php echo $user['user_face']; ?>" alt="">
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">性别</label>
                                <div class="layui-input-block">
                                    <input type="radio" name="user_sex" title="男" value="0" <?php if($user['user_sex'] == 0): ?>checked<?php endif; ?>  class="layui-input">
                                    <input type="radio" name="user_sex" title="女" value="1" <?php if($user['user_sex'] == 1): ?>checked<?php endif; ?> class="layui-input">
                                    <input type="radio" name="user_sex" title="保密" value="2" <?php if($user['user_sex'] == 2): ?>checked<?php endif; ?> class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label" for="city-picker">城市</label>
                                <div class="layui-input-block">
                                    <input type="text" autocomplete="on" value="<?php echo $user['user_city']; ?>" class="layui-input" id="city-picker" name="user_city" readonly="readonly" data-toggle="city-picker" placeholder="请选择">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label"></label>
                                <div class="layui-input-block">
                                    <input type="text" autocomplete="on" value="<?php echo $user['user_city1']; ?>" class="layui-input" name="user_city1" placeholder="请输入详细地址">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label" for="user_birthday">生日</label>
                                <div class="layui-input-block">
                                    <input type="text" class="layui-input" value="<?php echo $user['user_birthday']; ?>" name="user_birthday" id="user_birthday">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label" for="user_sign">签名</label>
                                <div class="layui-input-block">
                                    <textarea name="user_sign" id="user_sign" class="layui-textarea"><?php echo $user['user_sign']; ?></textarea>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <div class="layui-input-block">
                                    <label class="layui-form-label"><button class="layui-btn" lay-submit lay-filter="edit">保存</button></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="blank20"></div>
            <div class="blank20 hide-992"></div>
            <div class="blank20 hide-992"></div>
            <div class="blank20"></div>
            <div class="blank20 hide-992"></div>
            <div class="blank20 hide-992"></div>
            <div class="blank20 hide-992"></div>
        </div>
    </div>
    <script>
        layui.config({
            base: '/static/layuiadmin/layui_exts/' //静态资源所在路径
        }).extend({
            citypicker: 'city-picker/city-picker' // {/}的意思即代表采用自有路径，即不跟随 base 路径
        }).use(['citypicker'], function() {
            var $ = layui.$, cityPicker = layui.citypicker;
            var currentPicker = new cityPicker("#city-picker", {
                provincename: "provinceId",
                cityname: "cityId",
                districtname: "districtId",
                level: 'districtId', // 级别
            });
        });
        layui.use(['form','upload','laydate'],function () {
            var form = layui.form,upload = layui.upload,laydate = layui.laydate;
            //时间
            laydate.render({
                elem: '#user_birthday' //指定元素
            });
            //多图上传实例
            upload.render({
                elem: '#user_face',
                url: '<?php echo url("admin/AjaxAction/upload"); ?>',
                accept:"images",
                acceptMime: 'image/*',
                exts:"jpg|png|gif|bmp|jpeg",
                auto:true,
                size:51200,
                drag:false,
                before: function(obj) {
                    layer.msg('图片上传中...', {icon: 16,shade: 0.01,time: 0})
                },
                done: function(res) {
                    layer.close(layer.msg('上传成功！'));
                    $('input[name=user_face]').val(res.data);
                    $('#pic_img').html('<img src="'+res.data+'" />');
                }
                ,error: function(){
                    layer.msg('上传错误！');
                }
            });
            //保存信息
            form.on('submit(edit)', function(data){
                $.post('<?php echo url("users/users"); ?>',data.field,function (res) {
                    if (res.icon == 6){
                        layer.msg(res.msg,{icon: res.icon,time:1000},function(){
                            window.parent.location.reload();
                        });
                    } else {
                        layer.msg(res.msg,{icon: res.icon,time:1000},function(){
                            window.location.reload();
                        });
                    }
                },'json');
                return false;
            });

            //退出
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
