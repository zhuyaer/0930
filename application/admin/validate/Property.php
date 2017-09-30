<?php
/**
 * Created by PhpStorm.
 * User: zhu-y
 * Date: 2017/9/29
 * Time: 16:35
 */
namespace app\admin\validate;

use think\Validate;

class Property extends Validate{
    protected $rule = [
        ['username','require','姓名不能为空'],
        ['tel','require','电话不能为空'],
        ['address','require','地址不能为空'],
        ['question','require','问题不能为空'],
        ['content','require','内容不能为空'],
    ];
}