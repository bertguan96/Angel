<?php
/**
 * Created by PhpStorm.
 * User: gjt
 * Date: 2018/7/12
 * Time: 19:36
 */

/**
 * Class timeTool
 * 时间工具
 */
class timeTool {

    /**
     * 验证输入时间是否有效
     * @param $str 时间（格式：year-month-day）
     * @return boolean
     */
    function vaildDate($str){
        $time = explode('-',$str);
        echo $time[0]."-".$time[1]."-".$time[2];
        if(checkdate( $time[1], $time[2],$time[0])){
            return true;
        }
        return false;
    }

    /**
     * 常规日期格式方法(保留方法)
     * @param $timestamp   时间戳
     * @param string $rule  转换规则（默认：F d, Y h:i:s）
     * @return string 返回转换完成的时间
     */
    function formatNormalDate($timestamp, $rule = null){
        if($rule == null){
            $rule = "F d, Y h:i:s";
            return date($rule, $timestamp);
        }else {
            return date($rule, $timestamp);
        }
    }

    /**
     * @param $timestamp 时间戳（默认格式）
     * @return 时间
     */
    function formatDateNew($timestamp){
        $date = new DateTime($timestamp);
        return $date ->format("Y-m-d h:i:sa");
    }
}


