<?php
/**
 * Created by PhpStorm.
 * User: zhu-y
 * Date: 2017/10/7
 * Time: 1:15
 */

namespace app\admin\controller;


use think\Request;

class Questionnaire extends Admin
{

    // 列表
    public function index() {
        $Questionnaire = model('Questionnaire');
        $list = $Questionnaire->select();
        $this->assign('_list', $list);
        return $this->fetch('index');
    }

    // 添加
    public function add() {
        $Questionnaire = model('Questionnaire');
        if(request()->isPost()){
            $post_data= Request::instance()->post();
            $validate = validate('Questionnaire');
            if(!$validate->check($post_data)){
                return $this->error($validate->getError());
            } else {
                $data = $Questionnaire->allowField(true)->save($post_data);
                if($data){
                    $this->success('新增成功', url('index'));
                    //记录行为
                    action_log('update_Questionnaire', 'questionnaire', $data->id, UID);
                } else {
                    $this->error($Questionnaire->getError());
                }
            }
        } else {
            $this->meta_title = '新增问卷';
            return $this->fetch('edit');
        }

    }

    public function edit($id) {
        $Questionnaire = model('Questionnaire');
        if(request()->isPost()){ //提交表单
            $data=request()->post();
            if(false !== $Questionnaire->update($data)){
                $this->success('编辑成功！', url('index'));
            } else {
                $error = $Questionnaire->getError();
                $this->error(empty($error) ? '未知错误！' : $error);
            }
        } else {
            /* 获取分类信息 */
            $info = $id ? $Questionnaire->findOne($id) : '';
            $this->assign('info', $info);
            $this->assign('meta_title', '编辑分类');
            return $this->fetch('edit');
        }
    }

}