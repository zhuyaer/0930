<?php

/**
 *
 */
namespace app\admin\model;


use think\Model;
use think\model\relation\HasOne;

class Sale extends Model {

    protected $insert = ['status'=>1];

    protected $auto = ['uid'];
    protected function setUidAttr($value, $data)
    {
        return UID;
    }

    //查询列表，关联查询
    public function listsAll() {
        $list = \think\Db::table('sale s')
            ->join('member m', 'm.uid=s.uid')
            ->select();
        return $list;
    }

    // 查询一条数据
    public function findOne($id, $field = true){
        $map = array('id'=>$id);
        return $this->field($field)->where($map)->find()->toArray();
    }
}