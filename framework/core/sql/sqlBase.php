<?php
/**
 * Created by PhpStorm.
 * 基础增上改查操作
 * User: gjt
 * Date: 2018/1/5
 * Time: 14:10
 */
require "../../database/DBHelper.php";

/**
 * Class sqlBase（ old）
 * 基础SQL查询工具(不建议使用)
 * v1.0
 */
class sqlBase{

    private $conn;

    function __construct($conn)
    {
        $this -> conn = $conn;
    }

    /**
     * 根据id查找信息
     * $id为你要查找的数值
     * $tableName为你要查找的表
     * $select 为你要查找的值
     */
    function searchById($id, $tableName, $selcet)
    {
        /**
         *  如果是字符串，自动执行第一个方法，如果是第二个
         */
        if (is_string($id)) {
            $query = "SELECT * FROM " . $tableName . " WHERE " . $selcet . " = " . "\"" . $id . "\"";
            echo $query;
        } else {
            $query = "SELECT * FROM " . $tableName . " WHERE " . $selcet . " = " . "\"" . $id . "\"";
        }
        $result = @mysqli_query($this -> conn, $query) or die("数据获取失败" . mysqli_error($this -> conn));
        if ($result > 0) {
            mysqli_close($this -> conn);
            return $result;
        } else {
            mysqli_close($this -> conn);
            echo "查找失败";
        }
    }

    /**
     * 注：只支持删除一整条数据，，通过id删除
     * 根据id查找信息
     * $id         为你要删除的数值
     * $tableName  为你要查找的表
     * $select     为你要删除的字段
     */
    function delById($id, $tableName, $select)
    {
        /**
         *  如果是字符串，自动执行第一个方法，如果是第二个
         */
        if (is_string($id)) {
            $query = "DELETE  FROM " . $tableName . " WHERE " . $select . " = " . "\"" . $id . "\"";
            echo $query;
        } else {
            $query = "DELETE  FROM " . $tableName . " WHERE " . $select . " = " . "\"" . $id . "\"";
        }
        @mysqli_query($this -> conn, $query) or die("删除失败" . mysqli_error($this -> conn));
        echo "删除成功";
        mysqli_close($this -> conn);
    }

    /**
     * @param $tableName 输入表名
     * @return bool|mysqli_result
     * 一键查询所有数据
     */
    function searchAllFunction($tableName)
    {
        $query = "SELECT * FROM " . $tableName;
        $result = @mysqli_query($this -> conn, $query) or die("查询失败" . mysqli_error($this -> conn));
        mysqli_close($this -> conn);
        return $result;
    }

    /**
     * 根据主键删除指定字段的数据
     * @param $id          唯一ID（例如表格的编号）
     * @param $tableName   表名称
     */
    function delAllById($id, $tableName)
    {
        $query = "DELETE  FROM " . $tableName . " WHERE  id  = " . $id ;
        $result = @mysqli_query($this -> conn, $query) or die("删除失败" . mysqli_error($this -> conn));
        echo "删除成功";
        mysqli_close($this -> conn);
        return ;
    }
}
