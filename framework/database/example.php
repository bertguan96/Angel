<?php
/**
 * Created by PhpStorm.
 * User: gjt
 * Date: 2018/1/5
 * Time: 11:07
 */
require "../database/DBHelper.php";
/**
 * header 设置字符集
 */
header("Content-Type:text/html;charset=utf-8");
function getConnection(){
    $DB = new DBHelper();
    $conn = $DB->getConn();
    if($conn!=null){
        echo "成功获取到连接";
    }
}
getConnection();