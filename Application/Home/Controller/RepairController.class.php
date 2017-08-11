<?php
/**
 * 前台用户报修
 */

namespace Home\Controller;


class RepairController extends HomeController{
    //业主报修
    public function add(){
        //判断是否登录
        if ( !is_login() ) {
            $this->error( '您还没有登陆',U('User/login') );
        }
        //判断业主是否验证
        //如已经验证则显示用户报修列表
        //如未验证则显示验证页面
        if (IS_POST) {
            $Property = D('Property');

            $data = $Property->create();
            if ($data) {
                //$Property->sn = 'hvhjvbj';
                $id = $Property->add();
                if ($id) {
                    $this->success('新增成功', U('Index/index'));
                    //var_dump($Property);exit;
                    //记录行为
                    action_log('update_property', 'property', $id, UID);
                } else {
                    $this->error('新增失败');
                }
            } else {
                $this->error($Property->getError());
            }
        }else{
            $this->display();
        }

    }
}