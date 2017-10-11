<?php
/**
 * Created by PhpStorm.
 * User: zhu-y
 * Date: 2017/10/7
 * Time: 0:41
 */

namespace app\admin\controller;


use app\home\model\Document;

class Activity extends Admin
{

    public function index() {
        $document = new Document();
        $activities = $document->lists(46);
        $this->assign('_list', $activities);
        return $this->fetch('index');
    }

}