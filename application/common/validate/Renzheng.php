<?php
/**
 * Created by PhpStorm.
 * User: zhu-y
 * Date: 2017/10/7
 * Time: 2:52
 */

namespace app\common\validate;


use think\Validate;

class Renzheng extends Validate
{
    // 验证规则
    protected $rule = [
        ['username', 'require', '用户名必须'],
        ['room', 'require', '房间号必须'],
        ['relation', 'require', '与业主关系必须'],
        ['phone', 'require', '手机号不能为空'],
        ['card', 'require', '身份证号必须'],
        ['address', 'require', '小区名称必须'],
    ];

}