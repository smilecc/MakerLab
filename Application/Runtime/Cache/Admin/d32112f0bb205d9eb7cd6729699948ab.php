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

	

  <!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">项目审核</strong> / <small>Check</small></div>
    </div>


    <div class="am-g">
      <div class="am-u-sm-12">
          <table class="am-table am-table-striped am-table-hover table-main">
            <thead>
              <tr>
                <th class="table-check">
                  <input type="checkbox" />
                </th>
                <th class="table-id">ID</th>
                <th class="table-title">项目名称（点击查看详细内容）</th>
                <th class="table-author am-hide-sm-only">提交人</th>
                <th class="table-set">操作</th>
              </tr>
          </thead>
          <tbody>

          <?php if(is_array($ProList)): $i = 0; $__LIST__ = $ProList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr id="list-tr-<?php echo $vo['id'];?>">
              <td><input type="checkbox" /></td>
              <td id="find-list-answerid-<?php echo $vo['id'];?>"><?php echo $vo['id'];?></td>
              <td>
              <a href="javascript:;" data-am-collapse="{target: '#find-answer-<?php echo $vo['id'] ?>'}"><?php echo $vo['name'];?></a>
                <div id="find-answer-<?php echo $vo['id'];?>" class="am-collapse">
                  <?php echo $vo['intro'];?>
                  <br/><a target="_blank" href="<?php echo U('/Home/Project/detail'.'?id='.$vo['id']);?>">查看详细</a>
                </div>
              </td>
              <td class="am-hide-sm-only"><?php echo $vo['username'];?></td>
              <!--<td class="am-hide-sm-only">2014年9月4日 7:28:47</td>-->
              <td>
                <div class="am-btn-toolbar">
                  <div class="am-btn-group am-btn-group-xs">
                    <button class="am-btn am-btn-default am-btn-xs am-text-secondary" onclick="AllowBtnClick(<?php echo $vo['id'];?>,1)"><span class="am-icon-pencil-square-o"></span> 允许</button>
                    <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" onClick="AllowBtnClick(<?php echo $vo['id'];?>,2)"><span class="am-icon-trash-o"></span> 驳回</button>
                  </div>
                </div>
              </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>

          </tbody>
        </table>
          <div class="am-cf">共 <?php echo count($ProList);?> 条记录</div>
          <hr />
      </div>

    </div>
  </div>
  <!-- content end -->



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