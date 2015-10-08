<?php
namespace User\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$pro = M('Project')->where('username="%s"',cookie('username'))->select();

    	$proClass = new \Home\Model\ProjectClassModel();
    	$proClass->ArrayClassFactory($pro);
    	$this->assign('pro',$pro);
    	$this->display();
    }
}