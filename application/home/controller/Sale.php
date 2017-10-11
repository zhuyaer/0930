<?php
/**
 * Created by PhpStorm.
 * User: zhu-y
 * Date: 2017/10/6
 * Time: 21:09
 */

namespace app\home\controller;


class Sale extends Home {

    //页面展示
    public function index(){
        $Sale = new \app\admin\model\Sale();
        $sales = $Sale
            ->field('sale.id, path, title, description, price')
            ->where(array('type'=>2))
            ->join('picture p', 'icon=p.id')
            ->select();
        $rents = $Sale
            ->field('sale.id, path, title, description, price')
            ->where(array('type'=>1))
            ->join('picture p', 'icon=p.id')
            ->select();
        $this->assign('sales', $sales);
        $this->assign('rents', $rents);
        return $this->fetch('sale');
    }


    public function detail($id) {
        $Sale = new \app\admin\model\Sale();
        $info = $Sale
            ->where(array('id'=>$id))
            ->join('member m', 'm.uid=sale.uid')
            ->find();
        $this->assign('info', $info);
        return $this->fetch('detail');
    }

}