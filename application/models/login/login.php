<?php
/**
 * Created by PhpStorm.
 * User: gjt
 * Date: 2018/7/13
 * Time: 1:58
 */

/**
 * Class login
 * 登陆数据库层
 */
require "../../../config/DBConn.php";
require "../../../framework/core/sql/select.php";

class login{

    private $DB;

    private $select;

    private $conn;

    function __construct()
    {
        $this -> DB = new DBConn();
        $this -> conn = $this->DB->getConn();
        $this->select = new select($this -> conn);
    }

    /**
     * 获取登陆信息，返回给loginService处理
     * @param $username     用户名
     * @param $tableName    表名
     * @return bool|mysqli_result  结果
     */
    function getLoginUserMessage($username,$tableName){
        return $this->select->selectByPrimaryWords($tableName,"username",$username);
    }

    /**
     * 存放了登陆信息和后台生成的token
     * @param $Msg key-value形式
     */
    function changeLoginMessage($Msg){

    }

    /**
     * 释放登陆连接
     * @return string  关闭信息
     * @throws ErrorException  错误提示
     */
    function closeConn(){
        if($this -> conn != null){
            $this->DB->releaseConn($this -> conn);
            return "释放成功";
        }else {
            throw new RuntimeException ( "<mark>释放失败，连接不存在！</mark><br />" );
        }
    }

    /**
     * 下线方法（完成账号下线）
     * @param $Msg
     */
    function  loginOut($Msg){
        if($Msg != null){
            //TODO
        }else {
            throw new RuntimeException ( "<mark>下线失败，未知错误！</mark><br />" );
        }
    }

}