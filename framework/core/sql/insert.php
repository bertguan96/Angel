<?php
/**
 * Created by PhpStorm.
 * User: gjt
 * Date: 2018/8/25
 * Time: 23:28
 */

/**
 * Class insert
 * 插入方法
 */
class insert
{
    /**
     * @var 常量对象
     */
    private $printMsg;
    /**
     * @var 加载基础查询工具
     */
    private $baseSQLTools;

    /**
     * @var baseSQL 基础where子句
     */
    private $baseWhere;
    /**
     * @var 数据库连接
     */
    private $conn;

    function __construct($conn)
    {
        $this -> printMsg = new commonVariables();
        $this -> baseSQLTools = new baseSQLTools();
        $this -> baseWhere = new baseSQL();
        $this->conn = $conn;
    }

    /**
     * 此处为自由扩展部分
     * @param $value
     * @param $tableName
     */
    function insertAll($value, $tableName){

    }

    function  insertByArray($array, $tableName){

    }

}