<?php
/**
 * Created by PhpStorm.
 * User: gjt
 * Date: 2018/7/13
 * Time: 1:58
 */

/**
 * Class login
 * SSO单点登陆插件
 */
require "../../config/DBConn.php";

class login{

    private $DB;

    function __construct()
    {
        $this -> DB = new DBConn();
    }



}