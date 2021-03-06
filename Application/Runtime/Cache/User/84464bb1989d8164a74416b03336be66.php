<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<?php $auto_login = new \User\Api\UserApi; $auto_login->autologin(); if(!test_user()) exit('Not Login'); ?>
<html class="no-js">
<head>
	<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo C('SITE_TITLE');?> User Center</title>
  <meta name="description" content="这是一个 index 页面">
  <meta name="keywords" content="index">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="icon" type="image/png" href="assets/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="/Public/css/pnotify.custom.min.css"/>
  <link href="/Public/bootstrap/css/bootstrap.css" id="bootstrap-css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="/Public/assets/css/amazeui.min.css">
  <link rel="stylesheet" href="/Public/css/admin.css">
  <link rel="stylesheet" href="/Public/assets/css/app.css">
  <link rel="stylesheet" href="/Public/css/public.css">


  <!--[if (gte IE 9)|!(IE)]><!-->
  <script src="/Public/assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="/Public/bootstrap/js/bootstrap.min.js"></script>
  <script src="/Public/assets/js/amazeui.min.js"></script>
  <script src="/Public/js/notify.js"></script>
  <script src="/Public/js/admin.js"></script>
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，萌娘问答 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->


</head>
<body>
 
	<!-- 头部 -->
	<header class="am-topbar admin-header">
  <div class="am-topbar-brand">
    <strong><?php echo C('SITE_TITLE');?></strong> <small>User Center</small>
  </div>

  <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

  <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

    <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
      
    </ul>

  </div>
</header>

<div class="am-cf admin-main">
  <!-- sidebar start -->
  <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
    <div class="am-offcanvas-bar admin-offcanvas-bar">
      <ul class="am-list admin-sidebar-list">
        <li><a href="<?php echo U('/User/Index');?>"><span class="am-icon-home"> 我的概述</span></a></li>
        <li><a href="<?php echo U('/User/Setting');?>"><span class="am-icon-user"> 账户设置</span></a></li>

        <li><a href="<?php echo U('/');?>"><span class="am-icon-sign-out"> 返回主站</span></a></li>
      </ul>

      <div class="am-panel am-panel-default admin-sidebar-panel">
        <div class="am-panel-bd">
          <p><span class="am-icon-bookmark"></span> 公告</p>
          <p>一切慢慢来。</p>
        </div>
      </div>

      <div class="am-panel am-panel-default admin-sidebar-panel">
        <div class="am-panel-bd">
          <p><span class="am-icon-tag"></span> 啦啦啦</p>
          <p>闭眼随便过，睁眼将就活，我们的生活多美好</p>
        </div>
      </div>
    </div>
  </div>
  <!-- sidebar end -->
	<!-- /头部 -->

	<!-- 主体 -->

	

<!-- content start -->
<div class="admin-content">

  <div class="am-cf am-padding">
    <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">设置</strong> / <small>Setting</small></div>
  </div>

  <div class="am-tabs am-margin" data-am-tabs-noswipe="1">
    <ul class="am-tabs-nav am-nav am-nav-tabs">
      <li  class="am-active"><a href="#tab3">修改密码</a></li>
    </ul>

    <div class="am-tabs-bd">
      <div class="am-tab-panel am-fade am-in am-active" id="tab3">
        <form class="am-form">
          <div class="am-g am-margin-top-sm">
            <div class="am-u-sm-4 am-u-md-2 am-text-right">
              原密码
            </div>
            <div class="am-u-sm-8 am-u-md-4 am-u-end">
              <input type="password" id="input-old-password" class="am-input-sm">
            </div>
          </div>

          <div class="am-g am-margin-top-sm">
            <div class="am-u-sm-4 am-u-md-2 am-text-right">
              新密码
            </div>
            <div class="am-u-sm-8 am-u-md-4 am-u-end">
              <input type="password" id="input-new-password" class="am-input-sm">
            </div>
          </div>
          <div class="am-g am-margin-top-sm">
            <div class="am-u-sm-4 am-u-md-2 am-text-right">
              重复输入
            </div>
            <div class="am-u-sm-8 am-u-md-4 am-u-end">
              <input type="password" id="input-password-again" class="am-input-sm">
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>

  <div class="am-margin">
    <button type="button" id="btn-change-password" class="am-btn am-btn-primary am-btn-xs">提交保存</button>
    <button type="button" class="am-btn am-btn-primary am-btn-xs">放弃保存</button>
  </div>
</div>
<!-- content end -->

<script type="text/javascript">
  $(function() {
  $('#btn-change-password').on('click', function() {
    if($('#input-new-password').val() != $('#input-password-again').val())
    {
      error_notify_right('两次输入的密码不同');
      return;
    }
          $.ajax({
            type:"POST",
            url:"<?php echo U('User/Operation/ChangePassword');?>",
            data:{
                  oldpw:$("#input-old-password").val(),
                  newpw:$("#input-new-password").val()
                  },
            success:function(re){
               notify_re(re);
            }
          });
  });
});
</script>



	<!-- /主体 -->

	<!-- 底部 -->
	</div>
<a class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>
<script type="text/javascript">document.getElementById("admin-offcanvas").style.cssText="height:"+(document.body.scrollHeight - 52)+"px";</script>
<footer>
  <p class="am-padding-left">Design by Can.</p>
</footer>

	<!-- /底部 -->
</body>
</html>