<?php
  namespace app\index\model;
  use think\Model;
  class History extends Model{
    protected $updateTime = false;
    protected $createTime = 'ctime';
  }