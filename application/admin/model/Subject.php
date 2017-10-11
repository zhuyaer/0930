<?php
/**
 * Created by PhpStorm.
 * User: zhu-y
 * Date: 2017/10/7
 * Time: 5:46
 */

namespace app\admin\model;
use think\Model;


/**
 * 问卷题目
 * Class Subject
 * @package app\admin\model
 */
class Subject extends Model
{

    // 查询一条数据
    public function findOne($id, $field = true){
        $map = array('id'=>$id);
        return $this->field($field)->where($map)->find()->toArray();
    }

}