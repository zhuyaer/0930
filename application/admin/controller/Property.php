<?php
/**
 * Created by PhpStorm.
 * User: zhu-y
 * Date: 2017/9/29
 * Time: 12:03
 */
namespace app\admin\controller;

use think\Db;
use think\Request;

class Property extends Admin{
    /*
     * 物业管理首页
     * */
    public function index(){
        $map['status']  =   array('egt',0);
       // $list = \think\Db::name('property')->select();
        $list = $this->lists('Property', $map);
        $this->assign('list', $list);
        $this->assign('meta_title','物业管理');
        return $this->fetch();
    }

    /*
     * 物业管理添加
     * */
    public function add(){
        if(request()->isPost()){
            $Property = model('property');
            $post_data=Request::instance()->post();
            //自动验证
            $validate = validate('property');
            if(!$validate->check($post_data)){
                return $this->error($validate->getError());
            }

            $data = $Property->insert($post_data);
            if($data){
                $this->success('新增成功', url('index'));
                //记录行为
                action_log('update_property', 'property', $data->id, UID);
            } else {
                $this->error($Property->getError());
            }
        } else {
            $this->assign('info',null);
            return $this->fetch('edit');
        }
    }

    /**
     * 物业管理修改
     */
    public function edit($id = 0){
        if($this->request->isPost()){
            $postdata = \think\Request::instance()->post();
            $Property = \think\Db::name("property");
            $data = $Property->update($postdata);
            if($data !== false){
                $this->success('编辑成功', url('index'));
            } else {
                $this->error('编辑失败');
            }
        } else {

            /* 获取数据 */
            $info = \think\Db::name('Property')->find($id);

            if(false === $info){
                $this->error('获取配置信息错误');
            }

            $this->assign('info', $info);
            $this->meta_title = '编辑导航';
            return $this->fetch();
        }
    }

    /**
     * 删除频道
     * @author 艺品网络  <twothink.cn>
     */
    public function del($id){
        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }

        if(\think\Db::name('property')->where(['id'=>$id])->delete()){
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }

}