<?php
/**
 * Created by PhpStorm.
 * User: gjt
 * Date: 2018/7/12
 * Time: 19:06
 */

/**
 * Class strTool
 * 正则表达式工具
 */
class strTool {

    /**
     * 搜索匹配
     * @param $str  操作字符串
     * @param $type 操作类型
     * @return bool true 成功 false 失败
     */
    function strMatch($str,$type){
        if($type == 1){
            if(mb_ereg("[~a-z]",$str)){
                return false;
            }
            return true;
        }else if($type == 2){
            if(mb_eregi("[~a-z]",$str)){
                return false;
            }
            return true;
        }
    }

    /**
     * 自定义正则表达式规则匹配
     * @param $str   需要匹配的字符串
     * @param string $reg  匹配规则（默认规则：8-10位的字符串，只能包含大小写英文字母，和0-9的数字）
     * @param $type  类型（type = 1 区分大小写，type = 2 不区分大小写）
     * @return bool  true 验证通过，false 验证不通过
     */
    function pwdMatch($str, $reg = "^[a-zA-Z0-9]{8,10}", $type){
        if($type == 1){
            if(mb_ereg($reg, $str)){
                return false;
            }
            return true;
        }else if($type == 2){
            if(!mb_eregi($reg, $str)){
                return false;
            }
            return true;
        }
    }

    /**
     * 字符串比较工具
     * @param $str1   字符串一
     * @param $str2   字符串二
     * @param $type   匹配类型 （1.区分大小写，2.不区分大小写）
     * @return bool   匹配结果（true 正确 false 错误）
     */
    function strCmp($str1, $str2, $type){
        if($type == 1){
            if(strcmp($str1,$str2)!=0){
                return false;
            }
            return true;
        }else if($type == 2){
            if(strcasecmp($str1,$str2)!=0){
                return false;
            }
            return true;
        }
    }
}