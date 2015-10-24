<?php
namespace Home\Controller;
use Think\Controller;
class ActivityController extends Controller {
    public function index($online=-1){
        $this->assign('online',$online);
    	$this->display();
    }

    public function load($online=-1,$page)
    {

        $acList = M('Activity')->where($online==-1?'is_release=1':"online=$online AND is_release=1")->order('id desc')->page($page,12)->select();
        $now = time();
        // 分析活动是否过期
        foreach ($acList as &$value) {
            $over = strtotime($value['over_time']);
            if($now > $over)
            {
                $value['isOver'] = true;
            }
            else
            {
                $value['isOver'] = false;
            }
        }
        $this->assign('acList',$acList);
        $this->display();
    }
 
    public function form($id)
    {   
        if(!test_user())
        {
            $this->error('您还没有登录');
            return;
        }
        $proInfo = M('Activity')->where('id=%d',$id)->find();
        $questionList = M('ActivityForm')->where('activity_id=%d',$id)->select();
        $this->assign('questionList',$questionList);
        $this->assign('proInfo',$proInfo);
        $this->display();
    }

    public function detail($id)
    {
        $acDetail = M('Activity')->where('id=%d',$id)->find();
        // 比对活动是否结束
        $now = time();
        $over = strtotime($acDetail['over_time']);
        if($now > $over)
        {
            $acDetail['isOver'] = true;
        }
        else
        {
            $acDetail['isOver'] = false;
        }
        $this->assign('detail',$acDetail);
        if(IsAdmin())
        {
            $formList = M('ActivityFormSign')->where('activity_id=%d',$id)->select();
            $this->assign('formList',$formList);
        }
        $this->display();
    }

    public function FormDetail($signid)
    {  
        $list = M('ActivityFormAnswer')->where('sign_id=%d',$signid)->select();
        foreach ($list as &$value) {
            $value['question'] = M('ActivityForm')->where('id=%d',$value['question_id'])->getField('question');
        }
        $this->assign('list',$list);
        $this->display();
    }

    public function SetForm($id)
    {
        if(test_user())
        {
            $db = M('ActivityFormAnswer');
            $questionList = M('ActivityForm')->where('activity_id=%d',$id)->select();

            // 检查重复提交
            if(M('ActivityFormSign')->where('activity_id=%d AND username="%s"',$id,cookie('username'))->count() != 0)
            {
                $this->error('你已经提交过了');
                return;
            }

            $sign_data = array(
                    'username'    => cookie('username'), 
                    'activity_id' => $id,
                );
            $sign_id = M('ActivityFormSign')->add($sign_data);

            if($sign_id <= 0)
            {
                $this->error('系统异常，提交失败');
                return;
            }

            // 合成数据
            foreach ($questionList as $value) {
                if(count(I($value['id'])) == 0)
                {
                    $this->error('存在未填项');
                    return;
                }
                $data[] = array(
                    'question_id' => $value['id'],
                    'answer'      => I($value['id']),
                    'sign_id'     => $sign_id
                    );
            }
            if($db->addAll($data) > 0)
            {
                $this->success('提交成功','detail.html?id='.$id);
            }
            else
            {
                M('ActivityFormSign')->where('id=%d',$sign_id)->delete();
                $this->error('系统异常，提交失败');
            }
        } else $this->error('用户验证失败');
    }

}