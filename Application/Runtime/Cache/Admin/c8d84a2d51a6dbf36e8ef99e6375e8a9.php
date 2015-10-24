<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<?php $auto_login = new \User\Api\UserApi; $auto_login->autologin(); if(!IsAdmin()) exit('Permission error'); ?>
<html class="no-js">
<head>
	<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo C('SITE_TITLE');?> Admin Center</title>
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
    <strong><?php echo C('SITE_TITLE');?></strong> <small>Admin Center</small>
  </div>

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
        <li><a href="<?php echo U('/Admin/Index');?>"><span class="am-icon-home"> 系统概述</span></a></li>
        <li><a href="<?php echo U('/Admin/Check');?>"><span class="am-icon-server"> 项目审核</span></a></li>
        <li><a href="<?php echo U('/Admin/Activity');?>"><span class="am-icon-soccer-ball-o"> 创建活动</span></a></li>
        <li><a href="<?php echo U('/');?>"><span class="am-icon-sign-out"> 返回主站</span></a></li>
      </ul>
      
    </div>
  </div>
  <!-- sidebar end -->
	<!-- /头部 -->

	<!-- 主体 -->

	
  <script src="/Public/js/ajaxfileupload.js"></script>
  <script src="/Public/js/public.js"></script>

<div class="am-modal am-modal-no-btn" tabindex="-1" id="uploading">
<div class="am-modal-dialog">
  <div class="am-modal-hd">正在上传图片</div>
  <div class="am-modal-bd">
    <i class="am-icon-spinner am-icon-spin"></i>
  </div>
</div>
</div>

  <!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">创建活动</strong> / <small>Activity</small></div>
    </div>

<form class="am-form" method="post" action="<?php echo U('/Admin/Activity/CreateActivity');?>">
  <fieldset>

    <div class="am-form-group">
      <label for="doc-ipt-email-1">活动名称 <small>(最大16字)</small></label>
      <input type="text" value="<?php echo ($proinfo['name']); ?>" class="" style="width: 17em" id="doc-ipt-email-1" name="name" placeholder="你的活动叫什么呢？" required/>
    </div>

    <div class="am-form-group">
    	<label for="doc-ipt-email-1">活动类型</label><br/>
		<select name="online" data-am-selected="{btnStyle: 'secondary'}">
			<option value="1" >线上活动</option>
			<option value="0" >线下活动</option>
		</select>
	</div>

    <div class="am-form-group" style="width: 70%">
    	<label for="doc-ipt-email-1">时间设置</label>
<!--     	<input type="text" class="am-form-field" placeholder="开始日期" data-am-datepicker readonly/>
    	<input type="text" class="am-form-field" placeholder="结束日期" data-am-datepicker readonly/> -->

<div class="am-g">
  <div class="am-u-sm-6" style="padding-left: 0px;">
    <button type="button" class="am-btn am-btn-default am-margin-right" id="my-start">选择开始日期</button><span id="my-startDate">请选择</span>
    <input type="hidden" name="start_time" id="startTime">
  </div>
  <div class="am-u-sm-6" style="padding-left: 0px;">
    <button type="button" class="am-btn am-btn-default am-margin-right" id="my-end">选择结束日期</button><span id="my-endDate">请选择</span>
    <input type="hidden" name="over_time" id="overTime">
  </div>
</div>
<script>
  $(function() {
    var startDate = new Date(1970, 1, 1);
    var endDate = new Date(2099, 12, 31);
    var $alert = $('#my-alert');
    $('#my-start').datepicker().
      on('changeDate.datepicker.amui', function(event) {
        if (event.date.valueOf() > endDate.valueOf()) {
          $alert.find('p').text('开始日期应小于结束日期！').end().show();
        } else {
          $alert.hide();
          startDate = new Date(event.date);
          $('#my-startDate').text($('#my-start').data('date'));
          $('#startTime').val($('#my-start').data('date'));
        }
        $(this).datepicker('close');
      });

    $('#my-end').datepicker().
      on('changeDate.datepicker.amui', function(event) {
        if (event.date.valueOf() < startDate.valueOf()) {
          $alert.find('p').text('结束日期应大于开始日期！').end().show();
        } else {
          $alert.hide();
          endDate = new Date(event.date);
          $('#my-endDate').text($('#my-end').data('date'));
          $('#overTime').val($('#my-end').data('date'));
        }
        $(this).datepicker('close');
      });
  });
</script>
<div class="am-alert am-alert-danger" id="my-alert" style="display: none">
<p>开始日期应小于结束日期！</p>
</div>
    </div>

    <div class="am-form-group am-form-file">
      <label for="doc-ipt-file-2">上传封面 <small>(300*165)</small></label>

      <div>
        <button type="button" class="am-btn am-btn-default am-btn-sm">
          <i class="am-icon-cloud-upload"></i> 选择要上传的图片</button>
          <img class="am-radius am-img-thumbnail" id="imgdis" style="display: none;" src="/Public/Uploads/<?php echo ($proinfo['img']); ?>" alt=""/>
      </div>
      <input type="file" name="uploadImg" id="uploadImg">
    </div>
    <input type="hidden" value="<?php echo ($proinfo['img']); ?>" name="img" id="imgupload" required/>
<script>
  $(function() {
    $('#uploadImg').on('change', function() {
      var fileNames = '';
      $.each(this.files, function() {
      	console.log(this);
      	upload();
      });
    });
  });
</script>
<hr/>
    <button type="submit" class="am-btn am-btn-success">下一步，填写表单</button>
  </fieldset>
</form>

  </div>





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