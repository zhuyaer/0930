<?php
/**
 * Created by PhpStorm.
 * User: zhu-y
 * Date: 2017/10/7
 * Time: 1:14
 */

namespace app\admin\controller;


use app\common\model\Renzheng;

class Owner extends Admin
{
    public function index() {
        $Renzheng = new Renzheng();
        $list  = $Renzheng->select();
        $this->assign('_list', $list);
        return $this->fetch('index');
    }

}