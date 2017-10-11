<?php
/**
 * Created by PhpStorm.
 * User: zhu-y
 * Date: 2017/10/6
 * Time: 9:27
 */

namespace app\admin\controller;


use think\Request;

class Sale extends Admin
{
    public function add() {
        $Sale = model('Sale');
        if(request()->isPost()){
            $post_data= Request::instance()->post();
            $validate = validate('Sale');
            if(!$validate->check($post_data)){
                return $this->error($validate->getError());
            } else {
                $data = $Sale->allowField(true)->save($post_data);
                if($data){
                    $this->success('新增成功', url('index'));
                    //记录行为
                    action_log('update_property', 'property', $data->id, UID);
                } else {
                    $this->error($Sale->getError());
                }
            }
        } else {
            $this->meta_title = '新增租售信息';
            return $this->fetch('edit');
        }
    }

    public function index() {
        $list = model('Sale')->listsAll();
        $this->assign('_list', $list);
        return $this->fetch('index');
    }

    public function edit($id) {
        $Sale = model('Sale');
        if(request()->isPost()){ //提交表单
            $data=request()->post();
            if(false !== $Sale->update($data)){
                $this->success('编辑成功！', url('index'));
            } else {
                $error = $Sale->getError();
                $this->error(empty($error) ? '未知错误！' : $error);
            }
        } else {
            /* 获取分类信息 */
            $info = $id ? $Sale->findOne($id) : '';
            $this->assign('info', $info);
            $this->assign('meta_title', '编辑分类');
            return $this->fetch('edit');
        }
    }

    public function del() {
        $id = input('id');
        if(empty($id)){
            $this->error('参数错误!');
        }
        $Sale = model('Sale');
        $res = $Sale->where(array('id'=>$id))->delete();
        if($res !== false){
            //记录行为
            action_log('update_category', 'category', $id, UID);
            $this->success('删除分类成功！');
        }else{
            $this->error('删除分类失败！');
        }
    }
}