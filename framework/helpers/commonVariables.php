<?php
/**
 * Created by PhpStorm.
 * User: gjt
 * Date: 2018/7/11
 * Time: 21:41
 */

class commonVariables{

    private  $success = "成功";

    private  $fail = "失败";

    /**
     * @var string 新增指令
     */
    public static $add = "add";
    /**
     * @var string 删除指令
     */
    public static  $delete = "delete";
    /**
     * @var string 更新指令
     */
    public static  $update = "update";
    /**
     * @var string 查看指令
     */
    public static  $display = "display";
    /**
     * @var string 连接指令
     */
    public static  $connect = "connect";

    /**
     * @param $msg    传入参数（当前执行的操作）
     * @return string 返回消息
     */
    function successMsg($msg){
        return $msg.$this->success;
    }

    /**
     * @param $msg     传入参数
     * @return string  返回消息
     */
    function failMsg($msg){
        return $msg.$this->fail;
    }
}