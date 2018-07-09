<?php
/**
 * Created by PhpStorm.
 * User: gjt
 * Date: 2018/1/5
 * Time: 11:07
 */

/**
 * 加载数据库配置文件
 */
require "../libraries/configEntity.php";
/**
 * header 设置字符集
 */
header("Content-Type:text/html;charset=utf-8");
function getConnections(){
    $file = "..\..\application\config\DataBase.XML";
    $con = file_get_contents($file);
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
    define('DB_HOST', $data[0][$xmlTag[0]]);
    define('DB_USER', $data[0][$xmlTag[1]]);
    define('DB_PWD', $data[0][$xmlTag[2]]);
    define('DB_NAME', $data[0][$xmlTag[3]]);             //需要修改为自己的数据库名字
    global $conn;
    /**
     * 连接mysql
     */
    $conn = @mysqli_connect(DB_HOST, DB_USER, DB_PWD) or die("连接失败" . mysqli_error($conn));
    /**
     * 选择指定数据库，字符集
     */
    mysqli_select_db($conn, DB_NAME) or die("数据库错误" . mysqli_error($conn));

    echo "连接成功";
}

