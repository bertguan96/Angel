<?php
/**
 * Created by PhpStorm.
 * User: gjt
 * Date: 2018/7/12
 * Time: 0:18
 */

require "../../helpers/tools/baseSQL.php";
require "../../helpers/tools/baseSQLTools.php";
require "../../database/DBHelper.php";

class delete{
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
     * 根据ID删除指定条目的数据
     * @param $table 需要删除的表
     * @param $param 需要删除的参数名称
     * @param $id    需要删除的参数值
     * @return string 返回结果（字符串，成功 or 失败）
     */
    function deleteById($table,$param,$id){
        $query = "DELETE FROM " . $table .$this->baseWhere->baseWhere($param,$id);
        return $this->baseSQLTools->baseDelete($query, $this->conn);
    }

    /**
     * 删除表中所有数据（慎用）
     * @param $table    表名
     * @return string   结果
     */
    function deleteAll($table){
        $query = "DELETE FROM " . $table;
        return $this->baseSQLTools->baseDelete($query, $this->conn);
    }
}