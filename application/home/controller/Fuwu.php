<?php
/**
 * Created by PhpStorm.
 * User: zhu-y
 * Date: 2017/10/6
 * Time: 22:18
 */

namespace app\home\controller;


use think\Request;

class Fuwu extends Home
{

    // 服务首页
    public function index() {
        return $this->fetch('index');
    }

    // 关于我们
    public function about() {
        return $this->fetch('about');
    }

    // 业主认证
    public function renzheng(){
        $Renzheng = model('Renzheng');
        if(request()->isPost()) {
            $post_data= Request::instance()->post();
            $validate = validate('Renzheng');
            if(!$validate->check($post_data)){
                return $this->error($validate->getError());
            } else {
                $data = $Renzheng->allowField(true)->save($post_data);
                if($data){
                    $this->success('新增成功', url('index'));
                    //记录行为
                    action_log('update_renzheng', 'renzheng', $data->id, UID);
                } else {
                    $this->error($Renzheng->getError());
                }
            }
        } else {
            return $this->fetch('renzheng');
        }
    }

}