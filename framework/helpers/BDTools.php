<?php
/**
 * Created by PhpStorm.
 * User: gjt
 * Date: 2018/7/12
 * Time: 1:00
 */

require "../database/dbConfig.php";

/**
 * Class BDTools
 * 数据库基础执行工具（对表的操作）
 */
class BDTools{

    private $baseSQLTools;

    function __construct()
    {
        $this->baseSQLTools = new baseSQLTools();
    }

    /**
     * 删除跑路工具之，删表（慎用）
     * @param $table 表名称
     */
    function dropTable($table){
        $conn = getConnection();
    }

    /**
     * 新建表
     * @param $list (参数集合)
     */
    function createTable($list){
        $conn = getConnection();
    }

    /**
     * 修改表
     * @param $table   表名称
     * @param $optType 操作类型（1.修改字段名称，2.新增字段，3.删除字段）
     */
    function aleteTable($table,$optType){
        $conn = getConnection();
    }
}