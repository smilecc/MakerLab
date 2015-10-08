$(".js-follow").click(function(){
  if($(this).text()=='取消关注')
  {
    $(this).text('关注话题');
    $(this).removeClass('am-btn-success');
    $(this).addClass('am-btn-default');
  }
  else
  {
    $(this).text('取消关注');
    $(this).removeClass('am-btn-default');
    $(this).addClass('am-btn-success');
  }
});

  function logout(){
  $.ajax({
            type:"GET",
            url:"/index.php/User/Operation/logout.html",
            complete:function(re){
               location.reload();
            }
  });
}

function login(from){
  $.ajax({
            type:"POST",
            url:"/index.php/User/Operation/login.html",
            data:{
                  user:$("#username").val(),
                  pass:$("#password").val(),
                  remember_me:$("#remember-me").val()
                  },
            success:function(re){
                var jsonObject = JSON.parse(re);
                if(jsonObject['info']=="Success"){
                  success_notify("登录成功，正在跳转");
                  if(from == 'NULL') window.location.href='/';
                  else window.location.href=from;
                }else{
                  console.log(re);
                  error_notify(jsonObject['error']);
                }
            }
  });
}

function register(from){
  $.ajax({
            type:"POST",
            url:"/index.php/User/Operation/register.html",
            data:{
                  username:$("#username").val(),
                  password:$("#password").val(),
                  email:$("#email").val(),
                  },
            success:function(re){
              console.log(re);
              var jsonObject = JSON.parse(re);
                if(jsonObject['info']=="Success"){
                  success_notify("注册成功，自动登录完毕，正在跳转");
                  if(from == 'NULL') window.location.href='/';
                  else window.location.href=from;
                }else{
                  console.log(re);
                  error_notify(jsonObject['error']);
            }
          }
  });
}

function upload(){
$('#uploading').modal('open');
    $.ajaxFileUpload({
    url:"/index.php/Home/Project/upload.html",
    secureuri:false,
    fileElementId:'uploadImg',
    dataType:'text',
    success: function (data, status){
      $('#uploading').modal('close');
      var reg = /error\">(.*)<\/p>/;
      var result = reg.exec(data);
      if(result){
        error_notify('上传失败：' + result[1]);
      }else{
        success_notify('上传成功');
        $('#imgupload').val(data);
        $('#imgdis').attr('src','/Public/Uploads/' + data);
        $('#imgdis').show();
      }
    },
    error: function (data, status, e){
      error_notify(e);
    },
  });
  $(function() {
    $('#uploadImg').on('change', function() {
      var fileNames = '';
      $.each(this.files, function() {
        console.log(this);
        upload();
      });
    });
  });
}

function on_continue_put_question_btn_click(){
  $("#put-question-form").submit(function(e) {event.preventDefault()}).off('submit').submit(function() {console.log("submit unlock")});
  $("#put-question-form").submit();
}
function comment_toggle(data,mode){
  $("#comment-" + $(data).attr('value')).toggle();
  $("#div-comment-" + $(data).attr('value')).load('/index.php/Home/Question/get_comment.html?id='+$(data).attr('value')+'&mode='+mode);
  console.log('/index.php/Home/Question/get_comment.html?id='+$(data).attr('value')+'&mode='+mode);
}
function put_comment(project_id,mode){
  $.ajax({
            type:"POST",
            url:"/index.php/Home/Question/put_comment.html",
            data:{
                  id:project_id,
                  content:$("#put-comment-content-" + project_id).val(),
                  mode:mode
                  },
            success:function(re){
                if(notify_re(re)){
                  $("#div-comment-" + project_id).load('/index.php/Home/Question/get_comment.html?id='+project_id+'&mode='+mode);
                }
            }
  });
}


function on_follow_topic_btn_click(tid,tname,btn){
  $.ajax({
            type:"GET",
            url:"/index.php/Home/Topic/set_follow_topic.html?topic_id=" + tid,
            success:function(re){
              var jsonObject = JSON.parse(re);
              if(jsonObject['status'])
              {
                success_notify_right('<strong>'+tname + '</strong> '+jsonObject['info']);
              }
             else
             {
              error_notify_right(jsonObject['error']);
             }
            }
  });
}

function getCookie(cookieName) {
    var strCookie = document.cookie;
    var arrCookie = strCookie.split("; ");
    for(var i = 0; i < arrCookie.length; i++){
        var arr = arrCookie[i].split("=");
        if(cookieName == arr[0]){
            return arr[1];
        }
    }
    return "";
}



function push2timeline(mode,project_id,btn){
    $.ajax({
              type:"GET",
              url:"/index.php/Home/Question/push2timeline.html?mode=" + mode + "&project_id=" + project_id,
              success:function(re){
                 $(btn).text("已推送");
                 $(btn).addClass("am-disabled");
              }
    });
}

function get_info(){
  if(!$('#topbar-info').hasClass('am-active')) return;
  $.ajax({
              type:"GET",
              url:"/index.php/Home/index/update_time.html"
    });

    load_info_badge(0,0,0,0);
    $('#info_question').load('/index.php/Home/index/get_question.html');
    $('#info_follow').load('/index.php/Home/index/get_follow.html');
    $('#info_agree').load('/index.php/Home/index/get_agree.html');
}

function pushToFind(a_id)
{
  $.ajax({
  type:"POST",
  url:"/index.php/Admin/Find/AddItem",
  data:{
        answer_id:a_id,
        order:0
        },
  success:function(re){
     notify_re(re);
  }
  });
}

function notify_re(re)
{
  var jsonObject = JSON.parse(re);
  if(jsonObject['status']){
    success_notify_right(jsonObject['info']);
    return true;
  }
  else
  {
    error_notify_right(jsonObject['error']);
    return false;
  }
}

function CommemtAddAtuser(commentId,userId)
{
  $('#put-comment-content-'+commentId).val($('#put-comment-content-'+commentId).val() + "@" + $(userId).attr('user') + " ");
}