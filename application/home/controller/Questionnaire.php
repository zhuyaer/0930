<?php
/**
 * Created by PhpStorm.
 * User: zhu-y
 * Date: 2017/10/7
 * Time: 6:59
 */

namespace app\home\controller;

/**
 *
 * 调查问卷
 *
 * Class Questionnaire
 *
 * @package app\home\controller
 */
class Questionnaire extends Base
{
    public function index() {
        $Questionnaire = new \app\admin\model\Questionnaire();
        $_list = $Questionnaire
            ->join('picture p', 'questionnaire.icon=p.id')
            ->select();
        $this->assign('_list', $_list);
        return $this->fetch('index');
    }
}