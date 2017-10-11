<?php
/**
 * Created by PhpStorm.
 * User: zhu-y
 * Date: 2017/10/7
 * Time: 1:12
 */

namespace app\admin\controller;


class Score extends Admin
{
    public function log() {
        $Score = new \app\home\model\Score();
        $_list = $Score
                ->field('score.id, score.create_time, member.nickname, score.uid, score.score')
                ->join('member', 'member.uid=score.uid')
                ->select();
        $this->assign('_list', $_list);
        return $this->fetch('log');
    }
}