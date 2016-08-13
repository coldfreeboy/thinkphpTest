<?php
namespace Common\Model;
use Think\Model;

/**
 * 上传图片类
 * @author  singwa
 */
class PushModel extends Model {
    private $_uploadObj = '';
    private $_uploadImageData = '';

    const UPLOAD = 'upload';

    // 初始化上传对象
    public function __construct() {
        $this->_uploadObj = new  \Think\Upload();
        $this->_uploadObj->rootPath = './'.self::UPLOAD.'/';
        $this->_uploadObj->subName = date(Y) . '/' . date(m) .'/' . date(d);
        $this->_uploadObj->saveName ="";
        // $this->_uploadObj->maxSize   =     3145728 ;// 设置附件上传大小
        // $this->_uploadObj->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
    }

    //获得上传对象
    public function upload() {
        $res = $this->_uploadObj->upload();

        if($res) {
            return '/' .self::UPLOAD . '/' . $res['file']['savepath'] . $res['file']['savename'];
            // return $res;
    
        }else{
            return $res->getError();
        }
    }


}