<?php
/**
 * Created by PhpStorm.
 * User: gjt
 * Date: 2018/7/10
 * Time: 14:52
 */

function getMysqlConnection($config){
    /**
     * 连接mysql
     */
    $conn = @mysqli_connect($config -> DB_url, $config ->DB_username, $config ->DB_password) or die("连接失败" . mysqli_error($conn));
    /**
     * 选择指定数据库，字符集
     */
    mysqli_select_db($conn, $config ->DB_name) or die("数据库错误" . mysqli_error($conn));

    return $conn;
}