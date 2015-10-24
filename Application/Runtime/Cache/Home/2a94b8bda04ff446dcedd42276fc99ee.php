<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<?php $auto_login = new \User\Api\UserApi; $auto_login->autologin(); ?>
<html class="no-js">
<head>
	  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

  <!-- Set render engine for 360 browser -->
  <meta name="renderer" content="webkit">

  <!-- No Baidu Siteapp-->
  <meta http-equiv="Cache-Control" content="no-siteapp"/>

  <link rel="icon" type="image/png" href="/Public/assets/i/favicon.png">

  <!-- Add to homescreen for Chrome on Android -->
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="icon" sizes="192x192" href="/Public/assets/i/app-icon72x72@2x.png">

  <!-- Add to homescreen for Safari on iOS -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
  <link rel="apple-touch-icon-precomposed" href="/Public/assets/i/app-icon72x72@2x.png">

  <!-- Tile icon for Win8 (144x144 + tile color) -->
  <meta name="msapplication-TileImage" content="/Public/assets/i/app-icon72x72@2x.png">
  <meta name="msapplication-TileColor" content="#0e90d2">

  <link rel="stylesheet" href="/Public/css/pnotify.custom.min.css"/>
  <link href="/Public/bootstrap/css/bootstrap.css" id="bootstrap-css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="/Public/assets/css/amazeui.min.css">
  <link rel="stylesheet" href="/Public/assets/css/app.css">
  <link rel="stylesheet" href="/Public/css/public.css">

  <!--[if (gte IE 9)|!(IE)]><!-->
  <script src="/Public/assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="/Public/bootstrap/js/bootstrap.min.js"></script>
  <script src="/Public/assets/js/amazeui.min.js"></script>

  <script src="/Public/js/notify.js"></script>
<!--<![endif]-->

<!--[if IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，不能达到完整的浏览体验。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->
<!--[if lte IE 8]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，萌娘问答 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

<script type="text/javascript">
  var upload_mode = 'answer';
</script>
</head>
<body>
 
<div id="space_height">
	<!-- 头部 -->
	

<header class="am-topbar">
<div class="am-container">
  <h1 class="am-topbar-brand">
    <a href="/"><?php echo C('SITE_TITLE');?></a>
  </h1>

  <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#doc-topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

  <div class="am-collapse am-topbar-collapse" id="doc-topbar-collapse">
    <ul class="am-nav am-nav-pills am-topbar-nav">
      <li class="" id="topbar-index"><a href="/">首页</a></li>
      <li id="topbar-find"><a href="<?php echo U('/Home/Project');?>">发现</a></li>
      <li id="topbar-join"><a href="<?php echo U('/Home/Activity');?>">参与</a></li>
<!--       <li id="topbar-good"><a href="<?php echo U('/Home/Topic');?>">优势</a></li> -->
      <li id="topbar-addproject"><a href="<?php echo U('/Home/Project/submit');?>">+ 提交项目</a></li>
    </ul>


  <!--用户名下拉菜单-->
  <div class="am-collapse am-topbar-collapse am-topbar-right" id="doc-topbar-user">
    <?php if(cookie('username') == null): ?><a href="<?php echo U('/User/Login');?>" class="am-btn am-btn-primary am-topbar-btn am-btn-sm am-text-white">登录</a>
      <a href="<?php echo U('/User/Login/register');?>" class="am-btn am-btn-primary am-topbar-btn am-btn-sm am-text-white">注册</a>
    <?php else: ?>
      <ul class="am-nav am-nav-pills am-topbar-nav">
        <li class="am-dropdown" data-am-dropdown>
          <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;"><!-- <span class="am-badge am-badge-danger am-round msg-badge">1</span> -->
            <?php echo cookie('username');?> <span class="am-icon-caret-down"></span>
          </a>
          <ul class="am-dropdown-content">
            <?php if(IsAdmin()): ?><li class="am-dropdown-header">站点管理</li>
              <li><a href="<?php echo U('/Admin');?>">管理中心</a></li><?php endif; ?>
            <li class="am-dropdown-header">用户操作</li>
            <li><a href="<?php echo U('/User/');?>">用户中心</a></li>
            <li class="am-divider"></li>
            <li><a href="javascript:;" onclick="logout()">登出</a></li>
          </ul>
        </li>
      </ul><?php endif; ?>
    </div>

<script type="text/javascript">
  if(1 == 0) $('.msg-badge').css("display","none"); 
</script>

  </div>
  </div>
  
  <div data-am-widget="slider" class="am-slider am-slider-b1" data-am-slider='{&quot;controlNav&quot;:false}' >
  <ul class="am-slides">
      <li>
        	<a href="#"><img src="/Public/19700101561c6494d307b.jpg"></a>
         
      </li>
      <li>
        	<a href="#"><img src="/Public/19700101561c6494d307b.jpg"></a>
         
      </li>
  </ul>
</div>

</header>


	<!-- /头部 -->

	<!-- 主体 -->
	<div class="am-container">
	
<script type="text/javascript">
	$("#topbar-index").addClass("am-active");
</script>
<title>首页 - <?php echo C('SITE_TITLE');?></title>



	</div>
	<!-- /主体 -->

	<!-- 底部 -->
	<footer data-am-widget="footer" class="am-footer am-footer-default qa-footer-grey" data-am-footer="{  }">
  <div class="am-footer-switch">
    <span><?php echo C('SITE_TITLE');?></span>
  </div>
  <div class="am-footer-miscs ">
    <p>Design & Development by Can.</p>

  </div>
</footer>
	<!-- /底部 -->
</div>
<script src="/Public/js/ajaxfileupload.js"></script>
<script src="/Public/js/notify.js"></script>
<script src="/Public/js/public.js"></script>
</body>
</html>