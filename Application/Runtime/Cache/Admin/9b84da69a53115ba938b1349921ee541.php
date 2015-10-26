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

	

<script type="text/javascript">
function BindSubBtnHover(subid)
{
    $('#submit-btn-'+subid).text(' 数据已提交');
    $('#submit-btn-'+subid).hover(function(){
      $('#submit-btn-'+subid).removeClass('am-btn-success');
      $('#submit-btn-'+subid).addClass('am-btn-danger');
      $('#submit-btn-'+subid).removeClass('am-icon-check');
      $('#submit-btn-'+subid).addClass('am-icon-remove');
      $('#submit-btn-'+subid).text(' 删除这一项');
    },function(){
      $('#submit-btn-'+subid).addClass('am-icon-check');
      $('#submit-btn-'+subid).removeClass('am-icon-remove');
      $('#submit-btn-'+subid).removeClass('am-btn-danger');
      $('#submit-btn-'+subid).addClass('am-btn-success');
      $('#submit-btn-'+subid).text(' 数据已提交');
    });
}
function parse_notify(re,subid)
{
  console.log(re);
  var jsonObject = JSON.parse(re);
  if(jsonObject['status']){
    success_notify_right(jsonObject['info']);
    $('#submit-btn-'+subid).attr('resid',jsonObject['id']);
    BindSubBtnHover(subid);
    return true;
  }
  else
  {
    error_notify_right(jsonObject['info']);
    return false;
  }
}
  var NowQuestionCount = <?php echo count($questionList)+1;?>;
  function AddQuestion()
  {
    // 克隆表单
    var tempClone = $('#form_prototype').clone(false);
    // 重写所克隆表单的div id
    tempClone.attr('id','form_prototype'+(NowQuestionCount+1));
    tempClone.show();
    // 修改模板表单id，与被克隆表单岔开
    $('#question-1').attr('id','question-temp');
    $('#submit-btn-1').attr('id','submit-btn-temp');
    $('input:radio[name="input-options-1"]').attr('name','input-options-temp');
    // 输出被克隆表单
    tempClone.appendTo('#form_display');
    // 完善被克隆表单的id与属性 并恢复模板表单的id
    $('#question-1').val('');
    $('#question-1').attr('id','question-'+(NowQuestionCount+1));
    $('#question-temp').attr('id','question-1');
    $('input:radio[name="input-options-1"]').attr('name','input-options-'+(NowQuestionCount+1));

    $('#submit-btn-1').text(' 提交');
    $('#submit-btn-1').attr('resid','');
    $('#submit-btn-1').attr('sub',(NowQuestionCount+1));
    $('#submit-btn-1').attr('id','submit-btn-'+(NowQuestionCount+1));
    $('#submit-btn-temp').attr('id','submit-btn-1');
    $('input:radio[name="input-options-temp"]').attr('name','input-options-1');
    ++NowQuestionCount;
  }

  function Commit(th)
  {
    subid = $(th).attr('sub');
    if($(th).attr('resid') == '')
    {
        if($("#question-"+subid).val() == '')
        {
          error_notify_right('不能提交空问题');
          return;
        }
        $.ajax({
            type:"POST",
            url:"/index.php/Admin/Activity/CommitQuestionForm",
            data:{
                  aid:<?php echo $aid;?>,
                  question:$("#question-"+subid).val(),
                  input:$('input:radio[name="input-options-'+subid+'"]:checked').val()
                  },
            success:function(re){
               parse_notify(re,subid);
        }
        });
    }else{
        $.ajax({
            type:"POST",
            url:"/index.php/Admin/Activity/DeleteQuestionForm",
            data:{
                  id:$(th).attr('resid')
                  },
            success:function(re){
              if(notify_re(re))
              {
                $('#form_prototype'+subid).fadeOut(700);
              }
        }
        });
    }
  }

  function NextStep()
  {
    window.location="<?php echo U('/Admin/Activity/detail');?>?" + 'id=<?php echo ($aid); ?>';
  }
</script>
  <!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">完善表单</strong> / <small>ActivityForm</small> <button class="am-btn am-btn-primary am-btn-xs am-icon-plus am-radius" onclick="AddQuestion()"> 增加一个表项</button></div>
    </div>

    <fieldset>
      <div class="am-form am-form-inline">

        <span id="form_prototype" style="display: none;">
          <div class="am-form-group am-form-icon">
            <i class="am-icon-question-circle"></i>
            <input type="text" class="am-form-field" id="question-1" placeholder="问题描述">
          </div>

          <div class="btn-group" data-toggle="buttons">
            <label class="btn btn-primary active">
              <input type="radio" name="input-options-1" value="0" autocomplete="off" checked> 单行输入框
            </label>
            <label class="btn btn-primary">
              <input type="radio" name="input-options-1" value="1" autocomplete="off"> 多行文本域
            </label>
          </div>

          <button class="am-btn am-btn-success am-btn-xs am-icon-check am-round" id="submit-btn-1" resid="" sub="1" onclick="Commit(this)"> 提交</button>
          <hr/>
        </span>

          <div id="form_display">
            <?php if(is_array($questionList)): $key = 0; $__LIST__ = $questionList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key; $k = $key + 1; ?>
              <span id="form_prototype<?php echo ($k); ?>">
                <div class="am-form-group am-form-icon">
                  <i class="am-icon-question-circle"></i>
                  <input type="text" class="am-form-field" id="question-<?php echo ($k); ?>" value="<?php echo ($vo['question']); ?>" placeholder="问题描述">
                </div>

                <div class="btn-group" data-toggle="buttons">
                  <label class="btn btn-primary <?php echo ($vo['input_element']?'':'active'); ?>">
                    <input type="radio" name="input-options-<?php echo ($k); ?>" value="0" autocomplete="off" <?php echo ($vo['input_element']?'':'checked'); ?>> 单行输入框
                  </label>
                  <label class="btn btn-primary <?php echo ($vo['input_element']?'active':''); ?>">
                    <input type="radio" name="input-options-<?php echo ($k); ?>" value="1" autocomplete="off" <?php echo ($vo['input_element']?'checked':''); ?>> 多行文本域
                  </label>
                </div>

                <button class="am-btn am-btn-success am-btn-xs am-icon-check am-round" id="submit-btn-<?php echo ($k); ?>" resid="<?php echo ($vo['id']); ?>" sub="<?php echo ($k); ?>" onclick="Commit(this)"> 提交</button>
                <hr/>
              </span>
              <script type="text/javascript">BindSubBtnHover(<?php echo ($k); ?>)</script><?php endforeach; endif; else: echo "" ;endif; ?>
          </div>
      </div>

      <button class="am-btn am-btn-success" onclick="NextStep()">下一步，填写详情</button>
      </fieldset>
    </div>
<script type="text/javascript">AddQuestion()</script>


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