<?php
namespace Home\Controller;
use Think\Controller;
class PushController extends Controller {
    public function index(){
        $this->display();
    }

    public function ajax_base_save(){
        // 照片文件上传
    $t =D("Push")->upload();

    print_r($t);



    }
}