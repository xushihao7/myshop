<?php
namespace app\index\controller;
use think\Controller;
class Member extends Common
{
    public function member()
    {
       $session=session("userInfo");
       $this->assign("session",$session);
       return view();
    }
}