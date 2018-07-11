<?php
/**
 * Created by PhpStorm.
 * User: gjt
 * Date: 2018/7/10
 * Time: 23:10
 */


require "../database/dbConfig.php";
require "../helpers/baseSQL.php";
require "../helpers/baseSQLTools.php";

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

    private $baseWhere;

    function __construct()
    {
        $this -> printMsg = new commonVariables();
        $this -> baseSQLTools = new baseSQLTools();
        $this -> baseWhere = new baseSQL();
    }

    /**
     * 查询表中所有信息
     * @param $table     表名
     * @return bool|mysqli_result  结果集
     */
    function selectAll($table){
        $query = "SELECT * FROM ".$table;
        $conn = getConnection();
        return $this->baseSQLTools->baseQuery($query, $conn);

    }

    /**
     * 根据ID查询获取表中信息
     * @param $table  表名
     * @param $id     唯一编号
     * @return bool|mysqli_result  结果集
     */
    function selectById($table, $id){
        $query = "SELECT * FROM ".$table." where id =".$id;
        $conn = getConnection();
        return $this->baseSQLTools->baseQuery($query, $conn);
    }

    /**
     * 查询指定参数的数据
     * @param $table 表名
     * @param $param 需要查询的参数
     * @param $id
     * @return bool|mysqli_result
     */
    function selectByPrimaryWords($table, $param, $id){

        $query = "SELECT * FROM " . $table . $this -> baseWhere->baseWhere($param, $id);
        $conn = getConnection();
        return $this->baseSQLTools->baseQuery($query, $conn);
    }
}
