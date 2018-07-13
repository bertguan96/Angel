<?php
/**
 * Created by PhpStorm.
 * User: gjt
 * Date: 2018/7/10
 * Time: 23:10
 */


require "../../helpers/tools/baseSQL.php";
require "../../helpers/tools/baseSQLTools.php";
require "../../database/DBHelper.php";

/**
 * Class select
 * @author 基础SQL类
 */
class select{
    /**
     * @var 常量对象
     */
    private $printMsg;
    /**
     * @var 加载基础查询工具
     */
    private $baseSQLTools;
    /**
     * @var baseSQL 数据库where工具
     */
    private $baseWhere;

    /**
     * @var 数据库连接
     */
    private $conn;

    /**
     * select constructor.
     * @param $conn 连接
     */
    function __construct($conn)
    {
        $this -> printMsg = new commonVariables();
        $this -> baseSQLTools = new baseSQLTools();
        $this -> baseWhere = new baseSQL();
        $this->conn = $conn;
    }

    /**
     * 查询表中所有信息
     * @param $table     表名
     * @return bool|mysqli_result  结果集
     */
    function selectAll($table){
        $query = "SELECT * FROM ".$table;
        return $this->baseSQLTools->baseQuery($query, $this->conn);

    }

    /**
     * 根据ID查询获取表中信息
     * @param $table  表名
     * @param $id     唯一编号
     * @return bool|mysqli_result  结果集
     */
    function selectById($table, $id){
        $query = "SELECT * FROM ".$table." where id =".$id;
        return $this->baseSQLTools->baseQuery($query, $this->conn);
    }

    /**
     * 查询指定参数的数据
     * @param $table 表名
     * @param $param 需要查询的参数
     * @param $id  参数
     * @return bool|mysqli_result 结果集
     */
    function selectByPrimaryWords($table, $param, $id){
        $query = "SELECT * FROM " . $table . $this -> baseWhere->baseWhere($param, $id);
        return $this->baseSQLTools->baseQuery($query, $this->conn);
    }
}
