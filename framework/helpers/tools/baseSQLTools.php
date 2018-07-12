<?php
/**
 * Created by PhpStorm.
 * User: gjt
 * Date: 2018/7/11
 * Time: 23:02
 */

/**
 * Class baseSQLTools
 * 数据库基础工具
 */
class baseSQLTools {

    /**
     * @var 常量对象
     */
    private $printMsg;

    /**
     * baseSQLTools constructor.
     * 初始化打印函数
     */
    function __construct()
    {
        $this -> printMsg = new commonVariables();
    }

    /**
     * 数据库基础查询工具（主要是select）
     * @param $conn   数据库连接
     * @param $query     查询语句
     * @return bool|mysqli_result  返回结果集
     */
    function baseQuery($conn,$query){
        $result = @mysqli_query($conn, $query) or die($this->printMsg->failMsg("查询") . mysqli_error($conn));
        mysqli_close($conn);
        return $result;
    }

    /**
     * 数据库基础删除工具（主要是delete）
     * @param $conn 数据库连接
     * @param $query 查询语句
     * @return string 返回提示
     */
    function baseDelete($conn,$query){
        $result = @mysqli_query($conn, $query) or die($this->printMsg->failMsg("删除") . mysqli_error($conn));
        mysqli_close($conn);
        return $this->printMsg->successMsg("删除");
    }

    /**
     * 数据库基础更新工具（主要是uqdate）
     * @param $conn  数据库连接
     * @param $query 查询语句
     * @return null  返回提示
     */
    function baseUpdate($conn,$query){
        //TODO
        return null;
    }

    /**
     * 数据库通用查询工具
     * @param $conn 数据库连接
     * @param $query 查询语句
     * @return string 返回提示
     */
    function baseNormalQuery($conn,$query){
        $result = @mysqli_query($conn, $query) or die($this->printMsg->failMsg("操作执行") . mysqli_error($conn));
        mysqli_close($conn);
        return $this -> printMsg->successMsg("操作");
    }
}
