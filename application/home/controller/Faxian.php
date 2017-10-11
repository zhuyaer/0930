<?php
/**
 * Created by PhpStorm.
 * User: zhu-y
 * Date: 2017/10/6
 * Time: 22:22
 */

namespace app\home\controller;


class Faxian extends Home
{
    public function index() {
        return $this->fetch('index');
    }
}