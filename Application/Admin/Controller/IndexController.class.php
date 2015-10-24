<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$ProCount = M('Project')->count();
    	$UserCount = M('User')->count();
    	$UncheckProCount = M('Project')->where('allow=0')->count();

    	$this->assign('ProCount',$ProCount);
    	$this->assign('UserCount',$UserCount);
    	$this->assign('UncheckProCount',$UncheckProCount);
    	$this->display();
    }
}