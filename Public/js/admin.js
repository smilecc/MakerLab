function notify_re(re)
{
  console.log(re);
  var jsonObject = JSON.parse(re);
  if(jsonObject['status']){
    success_notify_right(jsonObject['info']);
    return true;
  }
  else
  {
    error_notify_right(jsonObject['info']);
    return false;
  }
}

$(function() {
  $('#btn-add-find').on('click', function() {
    $('#find-add-prompt').modal({
      relatedTarget: this,
      onConfirm: function(e) {
          $.ajax({
		        type:"POST",
		        url:"/index.php/Admin/Find/AddItem",
		        data:{
		              answer_id:$("#input-find-add-answerid").val(),
		              order:$("#input-find-add-order").val()
		              },
		        success:function(re){
               notify_re(re);
		        }
          });
      }
    });
  });
});

function AllowBtnClick(agr_id,agr_llow)
{
  $.ajax({
  type:"POST",
  url:"/index.php/Admin/Check/SetProjectAllow",
  data:{
        id:agr_id,
        allow:agr_llow
        },
  success:function(re){
        if(notify_re(re))
        {
        	$('#list-tr-'+agr_id).fadeOut(800);
        }
  }
  });
}