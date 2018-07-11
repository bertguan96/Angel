<?php
/**
 * Created by PhpStorm.
 * User: gjt
 * Date: 2018/7/11
 * Time: 23:45
 */

class baseSQL{

    /**
     * baseWhere工具
     * @param $param   需要查询的参数
     * @param $id      值
     * @return string  返回的字符串
     */
    function baseWhere($param, $id){
        if (is_string($id)) {
            return  " WHERE " . $param . " = " . "\"" . $id . "\"";
        }else {
            return " WHERE " . $param . " = " . "\"" . $id . "\"";
        }
    }
    
}