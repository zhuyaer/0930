<?php
/**
 * Created by PhpStorm.
 * User: zhu-y
 * Date: 2017/10/7
 * Time: 5:27
 */

namespace app\admin\controller;


use think\Request;

class Subject extends Admin
{
    public function index() {
        $qid = input('qid');
        $Subject = model('Subject');
        $_list = $Subject->where(array('qid'=>$qid))->select();
        $this->assign('_list', $_list);
        $this->assign('qid', $qid);
        return $this->fetch('index');
    }

    public function add() {
        $qid = input('qid');
        $Subject = model('Subject');
        if(request()->isPost()){
            $post_data= Request::instance()->post();
            $validate = validate('Subject');
            if(!$validate->check($post_data)){
                return $this->error($validate->getError());
            } else {
                $data = $Subject->allowField(true)->save($post_data);
                if($data){
                    $this->success('新增成功', url("index?qid=".$qid));
                    //记录行为
                    action_log('update_subject', 'subject', $data->id, UID);
                } else {
                    $this->error($Subject->getError());
                }
            }
        } else {
            $this->assign('qid', $qid);
            return $this->fetch('edit');
        }
    }

    public function edit() {
        $id = input('id');
        $qid = input('qid');
        $Subject = model('Subject');
        if(request()->isPost()){ //提交表单
            $data=request()->post();
            if(false !==  $Subject->update($data)){
                $this->success('编辑成功！', url('index?qid='.$qid));
            } else {
                $error =  $Subject->getError();
                $this->error(empty($error) ? '未知错误！' : $error);
            }
        } else {
            /* 获取分类信息 */
            $info = $id ?  $Subject->findOne($id) : '';
            $this->assign('info', $info);
            $this->assign('qid', $qid);
            return $this->fetch('edit');
        }
    }

    public function del() {
        $id = input('id');
        if(empty($id)){
            $this->error('参数错误!');
        }
        $Subject = model('Subject');
        $res = $Subject->where(array('id'=>$id))->delete();
        if($res !== false){
            //记录行为
            action_log('update_subject', 'subject', $id, UID);
            $this->success('删除分类成功！');
        }else{
            $this->error('删除分类失败！');
        }
    }
}