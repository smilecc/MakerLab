<?php
namespace Admin\Controller;
use Think\Controller;
class CheckController extends Controller {
    public function index(){
    	$ProList = M('Project')->where('allow=0')->select();

    	$this->assign('ProList',$ProList);
    	$this->display();
    }

    // 设置审核的状态
    public function SetProjectAllow($id,$allow)
    {
		$resultArr = array(
		'status' => false,
		'info'	 => null
		);

    	if(IsAdmin())
    	{
    		if(M('Project')->where('id=%d',$id)->setField('allow',$allow))
    		{
    			$resultArr['status'] = true;
    			$resultArr['info'] = "操作成功";
    		}
    		else
    		{
    			$resultArr['info'] = '系统异常，操作失败';
    		}
    	}
    	else
    	{
    		$resultArr['info'] = '不具有管理员权限';
    	}

    	echo json_encode($resultArr);
    }
}