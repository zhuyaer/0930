<?php
/**
 * Created by PhpStorm.
 * User: zhu-y
 * Date: 2017/10/7
 * Time: 1:31
 */

namespace app\home\model;


use think\Model;

class Score extends Model
{
    protected $auto = ['uid'];
    protected function setUidAttr($value, $data)
    {
        $model = \model('Member')->getInfo();
        return $model['uid'];
    }

}