<?php
/**
 * Created by PhpStorm.
 * User: gjt
 * Date: 2018/7/10
 * Time: 14:55
 */
require "../../framework/core/sqlSettings.php";
class test{
    private $result;
    function __construct()
    {
        $this->result = searchAllFunction('maincommodity');
    }

    function getResult(){
        $total = mysqli_num_rows($this->result); //获得记录总量
        echo $total;
    }
}