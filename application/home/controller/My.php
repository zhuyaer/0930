<?php
/**
 * Created by PhpStorm.
 * User: zhu-y
 * Date: 2017/10/6
 * Time: 22:24
 */

namespace app\home\controller;


use app\home\model\Member;

class My extends Base
{

    public function index() {
        $Member = model('Member');
        $info = $Member->getInfo();
        $info = $Member->where(array('uid'=>$info['uid']))->find();
        $this->assign("info", $info);
        return $this->fetch('index');
    }

    // 签到
    public function sign() {
        $Score = model('score');
        $rand_number = rand(5, 20);
        $rand_object = array('score'=>$rand_number);

        $member = model('Member');
        $info = $member->getInfo();
        $uid = $info['uid'];
        $data = $member->execute('update member set score=score+'.$rand_number.' where uid='.$uid);
        if (!$data){
            $this->error($Score->getError());
            return;
        }
        $data = $Score->allowField(true)->save($rand_object);
        if($data){
            $this->success('签到成功');
        } else {
            $this->error($Score->getError());
        }
    }
}