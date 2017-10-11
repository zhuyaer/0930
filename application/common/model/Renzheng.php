<?php
/**
 * Created by PhpStorm.
 * User: zhu-y
 * Date: 2017/10/7
 * Time: 2:36
 */

namespace app\common\model;
use think\Model;

class Renzheng extends Model
{
    protected $insert = ['status'=>1];

    protected $auto = ['uid'];
    protected function setUidAttr($value, $data)
    {
        $model = \model('Member')->getInfo();
        return $model['uid'];
    }
}