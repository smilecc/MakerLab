<?php
namespace Home\Controller;
use Think\Controller;
class ProjectController extends Controller {
    public function index($type=0,$process=0){
    	// 把当前量传值给页面
    	$this->assign('nowType',$type);
    	$this->assign('nowProcess',$process);

    	// 取得库中的标签
    	$assignProcess = M('ProjectClass')->where('class=1')->select();
    	$assignType = M('ProjectClass')->where('class=2')->select();
    	$this->assign('process',$assignProcess);
    	$this->assign('type',$assignType);

    	$this->display();
    }

    public function submit(){
    	$process = M('ProjectClass')->where('class=1')->select();
    	$type = M('ProjectClass')->where('class=2')->select();
    	$tag = M('ProjectClass')->where('class=3')->select();

    	$this->assign('process',$process);
    	$this->assign('type',$type);
    	$this->assign('tag',$tag);
    	$this->display();
    }

    public function edit($id){
    	$process = M('ProjectClass')->where('class=1')->select();
    	$type = M('ProjectClass')->where('class=2')->select();
    	$tag = M('ProjectClass')->where('class=3')->select();

    	$this->assign('process',$process);
    	$this->assign('type',$type);
    	$this->assign('tag',$tag);

		$projectInfo = M('Project')->where('id=%d',$id)->find();
		$this->assign('proinfo',$projectInfo);
		$this->display();
    }

    // 图片的上传
	public function upload(){
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     3145728;// 设置附件上传大小
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->rootPath  =      './Public/Uploads/'; // 设置附件上传目录
		// 上传单个文件 
		$info   =   $upload->uploadOne($_FILES['uploadImg']);
		if(!$info) {// 上传错误提示错误信息
			$this->error($upload->getError());
		}else{// 上传成功 获取上传文件信息
			$image = new \Think\Image();
			$image->open($upload->rootPath.$info['savepath'].$info['savename']);
			$image->thumb(300, 165, \Think\Image::IMAGE_THUMB_FIXED)->save($upload->rootPath.$info['savepath'].'sm_'.$info['savename']);
			echo $info['savepath'].'sm_'.$info['savename'];
		}
	}

	public function uploadDetailImg(){
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     3145728;// 设置附件上传大小
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->rootPath  =      './Public/Uploads/'; // 设置附件上传目录
		// 上传单个文件 
		$info   =   $upload->upload();
		if(!$info) {// 上传错误提示错误信息
			echo $upload->getError();
		}else{// 上传成功 获取上传文件信息
			echo '/Public/Uploads/'.$info['upload']['savepath'].$info['upload']['savename'];
		}
	}

	public function addprj($name,$process,$type,$tag,$intro,$img,$id=0){
		if(!test_user()) 
		{
			$this->error('账号异常 提交失败');
			return;
		}
		if($img == null) 
		{
			$this->error('未上传封面图片');
			return;
		}

		$data = array(
			'name' 		=> $name,
			'img'  		=> $img,
			'process'	=> $process,
			'type'		=> $type,
			'tag'		=> $tag,
			'intro'		=> $intro,
			'username'	=> cookie('username')
			 );
		if($id == 0){
			$res = M('Project')->add($data);
			$id = $res;
		}else{
			$res = M('Project')->where('id=%d',$id)->save($data);
		}
		
		if($res > 0){
			header('Location: '.U('/Home/Project/detail').'?id='.$id);
		}
		else $this->error('未修改或系统异常');
	}

	public function detail($id)
	{
		$projectInfo = M('Project')->where('id=%d',$id)->find();
		D('ProjectClass')->ClassFactory($projectInfo);
		$this->assign('proinfo',$projectInfo);
		$this->display();
	}

	public function editdetail($id=0)
	{
		$detail = M('Project')->where('id=%d',$id)->getField('detail');
		$this->assign('detail',strtr($detail,array('\\'=>'\\\\',"'"=>"\\'","\r\n"=>'\\n')));
		$this->assign('id',$id);
		$this->display();
	}

	public function putEditDetail($id,$text){
		if(!test_user()) 
		{
			$this->error('账号异常 提交失败');
			return;
		}

		if($detail = M('Project')->where('id=%d',$id)->getField('username') == cookie('username'))
		{
			M('Project')->where('id=%d',$id)->setField('detail',$text);
			$this->success('提交成功', 'detail?id='.$id);
		}
		else $this->error('账号异常 提交失败');
	}

	public function load($type,$process,$page)
	{
    	if($type == 0){
    		$sqlConditionStr = '';
    	}else{
    		$sqlConditionStr = 'type='.$type.' AND ';
    	}

    	if($process == 0){
    		$sqlConditionStr = $sqlConditionStr.'1';
    	}else{
    		$sqlConditionStr = $sqlConditionStr.'process='.$process;
    	}
    	$proList = M('Project')->where($sqlConditionStr)->page($page,12)->select();
    	D('ProjectClass')->ArrayClassFactory($proList);
    	$this->assign('prolist',$proList);
    	$this->display();
	}
}