<?php
/**
 * Created by PhpStorm.
 * User: zhu-y
 * Date: 2017/10/7
 * Time: 4:56
 */

namespace app\admin\model;

use think\Model;

class Questionnaire extends Model
{
    protected $insert = ['count'=>0];

    protected $auto = ['uid'];
    protected function setUidAttr($value, $data)
    {
        return UID;
    }

    // 查询一条数据
    public function findOne($id, $field = true){
        $map = array('id'=>$id);
        return $this->field($field)->where($map)->find()->toArray();
    }
}