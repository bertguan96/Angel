<?php
/**
 * Created by PhpStorm.
 * User: gjt
 * Date: 2018/7/9
 * Time: 19:17
 */

class config
{

    private $DB_url;

    private $DB_username;

    private $DB_password;

    private $DB_max_con;

    private $DB_release_time;

    private $DB_name;

    private $DB_type;

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
    public function __get($name)
    {
        return $this->$name;
    }

    /**
     * configentity constructor.
     * @param $DB_url          数据库连接地址
     * @param $DB_username     数据库用户名
     * @param $DB_password     数据库密码
     * @param $DB_max_con      最大连接数
     * @param $DB_release_time 最大释放时间
     * @param $DB_name         数据库表名称
     * @param  $DB_type        数据库类型      暂定支持mysql 和 sqlserver
     */
    function __construct($DB_url,$DB_username,$DB_password,$DB_max_con,$DB_release_time,$DB_name,$DB_type) {
        $this->DB_url = $DB_url;
        $this->DB_username = $DB_username;
        $this->DB_password = $DB_password;
        $this->DB_max_con = $DB_max_con;
        $this->DB_release_time = $DB_release_time;
        $this->DB_name = $DB_name;
        $this->DB_type = $DB_type;
    }

    /**
     * 打印出连接状态
     * 1. 数据库连接地址
     * 2. 用户名
     * 3. 密码
     * 4. 最大连接数
     * 5. 释放时间
     * 6. 数据库表名称
     */
    public function printConnection() {
        echo "The URL address is : ".$this->DB_url."\nThe username is : ".$this->DB_username."\nThe password is : ".$this->DB_password."\nThe maxCon is : ".$this->DB_max_con."\nThe release time is : ".$this->DB_release_time."\nThe DBname is : ".$this->DB_name."\n";
    }
}