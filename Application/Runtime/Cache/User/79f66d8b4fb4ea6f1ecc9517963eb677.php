<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>注册 | <?php echo C('SITE_TITLE');?></title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="alternate icon" type="image/png" href="assets/i/favicon.png">
  <link rel="stylesheet" href="/Public/css/pnotify.custom.min.css"/>
  <link rel="stylesheet" href="/Public/assets/css/amazeui.min.css"/>
  <link href="/Public/bootstrap/css/bootstrap.css" id="bootstrap-css" rel="stylesheet" type="text/css"/>

  <script src="/Public/assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="/Public/bootstrap/js/bootstrap.min.js"></script>
  <script src="/Public/assets/js/amazeui.min.js"></script>
  <script src="/Public/js/notify.js"></script>
  <script src="/Public/js/public.js"></script>
  <style>
    .header {
      text-align: center;
    }
    .header h1 {
      font-size: 200%;
      color: #333;
      margin-top: 30px;
    }
    .header p {
      font-size: 14px;
    }
  </style>
</head>
<body style="background-color: #eee;">
<div class="header">
  <div class="am-g">
    <h1><?php echo C('SITE_TITLE');?></h1>
  </div>
  <hr />
</div>
<div class="am-g">
  <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
    <form method="post" class="am-form">
      <label for="username">用户名:</label>
      <input type="text" name="" id="username" value="">
      <br>
      <label for="email">邮箱:</label>
      <input type="text" name="" id="email" value="">
      <br>
      <label for="password">密码:</label>
      <input type="password" name="" id="password" value="">
      <br />
      <div class="am-cf">
        <input type="button" onclick="loading_notify();register('<?php echo $from;?>');" name="" value="注 册" class="am-btn am-btn-primary am-btn-sm am-fl">
        <a href="/User/Login/?from=<?php echo ($from); ?>" class="am-fr">我有账号 点此登录~</a>
      </div>
    </form>
    <hr>
    <p>© 2015 Design by can.</p>
  </div>
</div>
</body>
</html>