<?php
/**
 * Created by PhpStorm.
 * User: zhu-y
 * Date: 2017/10/6
 * Time: 15:30
 */

namespace app\admin\validate;

use think\Validate;

class Sale extends Validate
{
    protected $rule = [
        ['title','require','标题不能为空'],
        ['content','require','内容不能为空'],
    ];
}