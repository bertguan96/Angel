<?php
/**
 * Created by PhpStorm.
 * User: gjt
 * Date: 2018/1/5
 * Time: 11:07
 */
require "../helpers/config.php";
require "mySqlConfig.php";
/**
 * header 设置字符集
 */
header("Content-Type:text/html;charset=utf-8");
function getConnection(){
    $file = "../../application/config/DataBase.XML";
    $con = file_get_contents($file);
    echo "文件加载成";
    /**
     * XML文件标签
     */
    $xmlTag = array(
        "DB_url",
        "DB_username",
        "DB_password",
        "DB_name",
        "DB_max_con",
        "DB_release_time",
        "DB_type"
    );
    $arr = array();
    /**
     * 遍历标签
     */
    foreach($xmlTag as $x){
        preg_match_all("/<".$x.">.*<\/".$x.">/", $con, $temp);
        $arr[] = $temp[0];
    }
    $data = array();
    foreach($arr as $key => $value) {
        foreach($value as $k => $v) {
            $a = explode($xmlTag[$key].'>', $v);
            $v = substr($a[1], 0, strlen($a[1])-2);
            $data[$k][$xmlTag[$key]] = $v;
        }
    }
    echo '<pre>';
    define('DB_url', $data[0][$xmlTag[0]]);
    define('DB_username', $data[0][$xmlTag[1]]);
    define('DB_password', $data[0][$xmlTag[2]]);
    define('DB_name', $data[0][$xmlTag[3]]);             //需要修改为自己的数据库名字
    define('DB_max_con', $data[0][$xmlTag[4]]);
    define('DB_release_time', $data[0][$xmlTag[5]]);
    define('DB_type',$data[0][$xmlTag[6]]);

    $dbType = strtolower(DB_type);
    $config = new config(DB_url,DB_username,DB_password,DB_max_con,DB_release_time,DB_name,DB_type);
    $config->printConnection();
    global $conn;
    if($dbType == 'mysql'){
        $conn = getMysqlConnection($config);
        return $conn;
    }else{
        // TODO sqlserver数据库连接方式
    }
}
