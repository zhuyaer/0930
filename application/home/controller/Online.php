<?php
/**
 * Created by PhpStorm.
 * User: zhu-y
 * Date: 2017/10/1
 * Time: 12:03
 */
namespace app\home\controller;

class Online extends Home{
    //在线保修页面展示
    public function index(){
        return $this->fetch('online');
    }
}