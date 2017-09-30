<?php
/**
 * Created by PhpStorm.
 * User: zhu-y
 * Date: 2017/9/29
 * Time: 12:25
 */
namespace app\admin\model;

use app\admin\validate\Model;

class Property extends \think\Model {
    protected $insert = ['status'=>1];
}