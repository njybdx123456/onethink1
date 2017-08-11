<?php

namespace Admin\Model;
use Think\Model;

class PropertyModel extends Model{

    //自动验证
    protected $_validate = array(
        array('user_tel', 'require', '业主电话不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
        array('username', 'require', '业主名称不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
        array('title', 'require', '标题不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
        array('address', 'require', '地址不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
        array('content', 'require', '保修详情不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
    );

    //自动完成
    protected $_auto = array(
        array('create_time', NOW_TIME, self::MODEL_INSERT),
        array('status', '1', self::MODEL_INSERT),
        array('sn', 'uniqid', self::MODEL_INSERT,'function'),
    );
}