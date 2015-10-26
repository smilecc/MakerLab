<?php
namespace Admin\Controller;
use Think\Controller;
class ActivityController extends Controller {
    public function index()
    {
    	$this->display();
    }

    public function form($id)
    {
    	$questionList = M('ActivityForm')->where('activity_id=%d',$id)->select();
    	$this->assign('aid',$id);
    	$this->assign('questionList',$questionList);
    	$this->display();
    }

    public function detail($id)
    {
        $detail = htmlspecialchars(M('Activity')->where('id=%d',$id)->getField('detail'));
        $this->assign('detail',strtr($detail,array('\\'=>'\\\\',"'"=>"\\'","\r\n"=>'\\n')));
        $this->assign('id',$id);
        $this->display();
    }

    public function CreateActivity($name,$online,$img,$over_time,$start_time){
        if(IsAdmin())
        {
            $data = array(
                'username'  => cookie('username'),
                'name'      => $name,
                'img'       => $img,
                'online'    => $online,
                'over_time' => $over_time,
                'start_time'=> $start_time,
                'is_release'=> 0
                );
            if(($id = M('Activity')->add($data)) > 0)
            {
                //$this->success('创建成功');
                header('Location: '.U('/Admin/Activity/form').'?id='.$id);
            }
            else
            {
                $this->error('系统异常，创建失败');
            }
        }
        else
        {
            $this->error('不具有权限');
        }
    }
 
    public function DeleteActivity($id)
    {
        if(IsAdmin())
        {
            if(M('Activity')->where('id=%d',$id)->delete())
            {
                $this->success('删除成功','/Home/Activity');
            }
            else
            {
                $this->error('系统异常，删除失败');
            }
        }
        else
        {
            $this->error('不具有权限');
        }
    }

    public function CommitQuestionForm($aid,$question,$input)
    {
        $resultArr = array(
        'status' => false,
        'info'   => null
        );
        if(IsAdmin())
        {
            $data = array(
                'activity_id' => $aid,
                'question'   => $question,
                'input_element' => $input
                );
            if(($res_id = M('ActivityForm')->add($data)) > 0)
            {
                $resultArr['status'] = true;
                $resultArr['info'] = '存储成功';
                $resultArr['id'] = $res_id;
            }
            else
            {
                $resultArr['info'] = '系统异常，创建失败';
            }
        }
        else
        {
            $resultArr['info'] = '不具有权限';
        }
        echo json_encode($resultArr);
    }

    public function DeleteQuestionForm($id)
    {
        $resultArr = array(
        'status' => false,
        'info'   => null
        );
        if(IsAdmin())
        {
            if(M('ActivityForm')->where('id=%d',$id)->delete() > 0)
            {
                // 删除相应问题的所有答案
                M('ActivityFormAnswer')->where('question_id=%d',$id)->delete();
                $resultArr['status'] = true;
                $resultArr['info'] = '删除成功';
            }
            else
            {
                $resultArr['info'] = '系统异常，删除失败';
            }
        }
        else
        {
            $resultArr['info'] = '不具有权限';
        }
        echo json_encode($resultArr);
    }

    public function putDetail($id,$text){
        if(!IsAdmin()) 
        {
            $this->error('不具有权限');
            return;
        }

        if(M('Activity')->where('id=%d',$id)->setField('detail',$text))
        {
            M('Activity')->where('id=%d',$id)->setField('is_release',1);
            $this->success('提交成功', '/Home/Activity/detail?id='.$id);
        }
        else 
        {
            $this->error('账号异常 提交失败');
        }
    }
}