<?php
/**
 * Created by PhpStorm.
 * User: gjt
 * Date: 2018/1/5
 * Time: 14:10
 */
require "../database/dbConfig.php";

/**
 * 根据id查找信息
 * $id为你要查找的数值
 * $tableName为你要查找的表
 * $select 为你要查找的值
 */
function searchById($id, $tableName, $selcet)
{
    $conn = getConnection();
    /**
     *  如果是字符串，自动执行第一个方法，如果是第二个
     */
    if (is_string($id)) {
        $query = "SELECT * FROM " . $tableName . " WHERE " . $selcet . " = " . "\"" . $id . "\"";
        echo $query;
    } else {
        $query = "SELECT * FROM " . $tableName . " WHERE " . $selcet . " = " . "\"" . $id . "\"";
    }
    $result = @mysqli_query($conn, $query) or die("数据获取失败" . mysqli_error($conn));
    if ($result > 0) {
        mysqli_close($conn);
        return $result;
    } else {
        mysqli_close($conn);
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
    $conn = getConnection();
    /**
     *  如果是字符串，自动执行第一个方法，如果是第二个
     */
    if (is_string($id)) {
        $query = "DELETE  FROM " . $tableName . " WHERE " . $select . " = " . "\"" . $id . "\"";
        echo $query;
    } else {
        $query = "DELETE  FROM " . $tableName . " WHERE " . $select . " = " . "\"" . $id . "\"";
    }
    @mysqli_query($conn, $query) or die("删除失败" . mysqli_error($conn));
    echo "删除成功";
    mysqli_close($conn);
}

/**
 * @param $tableName //输入表名
 * @return bool|mysqli_result
 * 一键查询所有数据
 */
function searchAllFunction($tableName)
{
    $conn = getConnection();
    $query = "SELECT * FROM " . $tableName;
    $result = @mysqli_query($conn, $query) or die("查询失败" . mysqli_error($conn));
    mysqli_close($conn);
    return $result;
}
function delAllById($id, $tableName)
{
    $conn = getConnection();
    $query = "DELETE  FROM " . $tableName . " WHERE  id  = " . $id ;
    echo $query;
    $result = @mysqli_query($conn, $query) or die("删除失败" . mysqli_error($conn));
    echo "删除成功";
    mysqli_close($conn);
    return ;
}