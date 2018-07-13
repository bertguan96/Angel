<?php
/**
 * Created by PhpStorm.
 * User: gjt
 * Date: 2018/7/12
 * Time: 11:37
 */

/**
 * Class DBConn
 * 数据库连接配件
 */
class DBConn {
    /**
     * @var 数据库
     */
    private $DB;
    /**
     * DBConn constructor.
     */
    function __construct()
    {
        $this -> DB= new DBHelper();
    }

    /**
     * 获取数据库连接
     * @return mixed   连接结果
     * @throws ErrorException  提示无法获取到连接
     */
    function getConn(){
        $conn = $this -> DB->getConn();
        if($conn!=null){
            echo "成功获取到连接";
            return $conn;
        }
        return null;
    }

    /**
     * 释放数据库连接
     * @param $conn   传入需要释放的连接
     * @return bool 返回释放结果 (true:释放成功，false:释放失败)
     * @throws ErrorException  释放错误需要抛出异常
     */
    function releaseConn($conn) {
        if($conn != null){
            $this->DB->release($conn);
            return true;
        }else {
            return false;
        }

    }
}